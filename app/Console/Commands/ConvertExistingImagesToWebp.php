<?php

namespace App\Console\Commands;

use App\Helpers\UploadHelper;
use App\Models\DigitalProduct;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Training;
use App\Models\User;
use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ConvertExistingImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:convert-webp {--update-db=true : Update database paths to .webp equivalents} {--force : Force re-convert already converted webp files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert existing images (PNG, JPG, JPEG) to high-quality compressed WebP and update DB references';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        @ini_set('memory_limit', '1024M');
        $this->info('Starting SmartVerse WebP Conversion & Optimization...');

        $targetDirs = [
            public_path('uploads'),
            public_path('images'),
            public_path('preview'),
            public_path('btd'),
            public_path('forensic'),
        ];

        $filesToConvert = [];
        $totalOriginalBytes = 0;

        foreach ($targetDirs as $dir) {
            if (!is_dir($dir)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
            foreach ($iterator as $file) {
                if ($file->isFile() && preg_match('/\.(png|jpe?g)$/i', $file->getFilename())) {
                    $filesToConvert[] = $file->getRealPath();
                    $totalOriginalBytes += $file->getSize();
                }
            }
        }

        $totalCount = count($filesToConvert);
        $this->info("Found {$totalCount} images (" . round($totalOriginalBytes / 1024 / 1024, 2) . " MB).");

        if ($totalCount === 0) {
            $this->warn('No images found to convert.');
            return Command::SUCCESS;
        }

        $progressBar = $this->output->createProgressBar($totalCount);
        $progressBar->start();

        $force = (bool) $this->option('force');
        $convertedCount = 0;
        $totalWebpBytes = 0;
        $conversionMap = []; // old relative path => new relative path

        foreach ($filesToConvert as $filePath) {
            $info = pathinfo($filePath);
            $destPath = $info['dirname'] . DIRECTORY_SEPARATOR . $info['filename'] . '.webp';

            $oldRel = '/' . str_replace('\\', '/', ltrim(str_replace(public_path(), '', $filePath), '\\/'));
            $newRel = '/' . str_replace('\\', '/', ltrim(str_replace(public_path(), '', $destPath), '\\/'));

            if (!$force && file_exists($destPath) && filesize($destPath) > 0) {
                $convertedCount++;
                $totalWebpBytes += filesize($destPath);
                $conversionMap[$oldRel] = $newRel;
                $progressBar->advance();
                continue;
            }

            try {
                // High visual fidelity (quality 82, max dimension 1920)
                $success = UploadHelper::convertFile($filePath, $destPath, 1920, 82);

                if ($success && file_exists($destPath)) {
                    $convertedCount++;
                    $totalWebpBytes += filesize($destPath);
                    $conversionMap[$oldRel] = $newRel;
                }
            } catch (\Throwable $e) {
                // Keep moving forward gracefully on individual file error
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        $savedBytes = $totalOriginalBytes - $totalWebpBytes;
        $savedPct = $totalOriginalBytes > 0 ? round(($savedBytes / $totalOriginalBytes) * 100, 1) : 0;

        $this->info("Conversion Complete!");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Images Processed', $totalCount],
                ['Successfully Converted to WebP', $convertedCount],
                ['Original Total Size', round($totalOriginalBytes / 1024 / 1024, 2) . ' MB'],
                ['Optimized WebP Size', round($totalWebpBytes / 1024 / 1024, 2) . ' MB'],
                ['Storage & Bandwidth Saved', round($savedBytes / 1024 / 1024, 2) . " MB ({$savedPct}%)"],
            ]
        );

        $shouldUpdateDb = filter_var($this->option('update-db'), FILTER_VALIDATE_BOOLEAN);

        if ($shouldUpdateDb) {
            $this->info('Updating Database image references to .webp paths...');
            $updatedRecords = $this->updateDatabaseReferences($conversionMap);
            $this->info("Database updated! {$updatedRecords} record(s) modified.");
        }

        return Command::SUCCESS;
    }

    /**
     * Update database columns pointing to old image paths to the new .webp paths.
     */
    protected function updateDatabaseReferences(array $conversionMap): int
    {
        $updatedCount = 0;

        // 1. Posts
        foreach (Post::whereNotNull('thumbnail')->get() as $post) {
            $clean = '/' . ltrim(parse_url($post->thumbnail, PHP_URL_PATH), '/');
            if (isset($conversionMap[$clean])) {
                $post->thumbnail = $conversionMap[$clean];
                $post->save();
                $updatedCount++;
            }
        }

        // 2. Projects
        foreach (Project::all() as $project) {
            $changed = false;
            if ($project->thumbnail) {
                $clean = '/' . ltrim(parse_url($project->thumbnail, PHP_URL_PATH), '/');
                if (isset($conversionMap[$clean])) {
                    $project->thumbnail = $conversionMap[$clean];
                    $changed = true;
                }
            }
            if (!empty($project->gallery) && is_array($project->gallery)) {
                $newGallery = [];
                foreach ($project->gallery as $item) {
                    if (is_array($item) && isset($item['url'])) {
                        $cleanG = '/' . ltrim(parse_url($item['url'], PHP_URL_PATH), '/');
                        if (isset($conversionMap[$cleanG])) {
                            $item['url'] = $conversionMap[$cleanG];
                            $changed = true;
                        }
                    }
                    $newGallery[] = $item;
                }
                if ($changed) {
                    $project->gallery = $newGallery;
                }
            }
            if ($changed) {
                $project->save();
                $updatedCount++;
            }
        }

        // 3. Digital Products
        foreach (DigitalProduct::all() as $prod) {
            if ($prod->thumbnail) {
                $clean = '/' . ltrim(parse_url($prod->thumbnail, PHP_URL_PATH), '/');
                if (isset($conversionMap[$clean])) {
                    $prod->thumbnail = $conversionMap[$clean];
                    $prod->save();
                    $updatedCount++;
                }
            }
        }

        // 4. Galleries
        foreach (Gallery::all() as $gal) {
            if ($gal->image_path) {
                $clean = '/' . ltrim(parse_url($gal->image_path, PHP_URL_PATH), '/');
                if (isset($conversionMap[$clean])) {
                    $gal->image_path = $conversionMap[$clean];
                    $gal->save();
                    $updatedCount++;
                }
            }
        }

        // 5. Trainings
        foreach (Training::all() as $tr) {
            if ($tr->thumbnail) {
                $clean = '/' . ltrim(parse_url($tr->thumbnail, PHP_URL_PATH), '/');
                if (isset($conversionMap[$clean])) {
                    $tr->thumbnail = $conversionMap[$clean];
                    $tr->save();
                    $updatedCount++;
                }
            }
        }

        // 6. Users
        foreach (User::whereNotNull('avatar')->get() as $u) {
            $clean = '/' . ltrim(parse_url($u->avatar, PHP_URL_PATH), '/');
            if (isset($conversionMap[$clean])) {
                $u->avatar = $conversionMap[$clean];
                $u->save();
                $updatedCount++;
            }
        }

        // 7. Settings
        foreach (Setting::all() as $setting) {
            if ($setting->value) {
                $clean = '/' . ltrim(parse_url($setting->value, PHP_URL_PATH), '/');
                if (isset($conversionMap[$clean])) {
                    $setting->value = $conversionMap[$clean];
                    $setting->save();
                    $updatedCount++;
                }
            }
        }

        return $updatedCount;
    }
}
