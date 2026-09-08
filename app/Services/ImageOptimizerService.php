<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use Illuminate\Http\UploadedFile;

class ImageOptimizerService
{
    /**
     * Convert and store an uploaded file directly as an optimized WebP.
     */
    public function convertAndStore(UploadedFile $file, string $directory = 'general', int $maxWidth = 1920, int $quality = 82): ?string
    {
        return UploadHelper::upload($file, $directory);
    }

    /**
     * Convert an existing image file on disk to an optimized WebP image.
     */
    public function convertExistingFile(string $sourcePath, ?string $destinationPath = null, int $maxWidth = 1920, int $quality = 82): ?string
    {
        if (!file_exists($sourcePath)) {
            return null;
        }

        if ($destinationPath === null) {
            $info = pathinfo($sourcePath);
            $destinationPath = $info['dirname'] . DIRECTORY_SEPARATOR . $info['filename'] . '.webp';
        }

        $success = UploadHelper::convertFile($sourcePath, $destinationPath, $maxWidth, $quality);

        return $success ? $destinationPath : null;
    }
}
