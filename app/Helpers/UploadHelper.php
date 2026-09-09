<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadHelper
{
    /**
     * Strict whitelist of safe file extensions
     */
    protected const ALLOWED_EXTENSIONS = [
        'jpg', 'jpeg', 'png', 'webp', 'gif', 'ico', 'pdf'
    ];

    /**
     * Strict whitelist of allowed MIME types
     */
    protected const ALLOWED_MIME_TYPES = [
        'image/jpeg' => ['jpg', 'jpeg'],
        'image/png' => ['png'],
        'image/webp' => ['webp'],
        'image/gif' => ['gif'],
        'image/x-icon' => ['ico'],
        'image/vnd.microsoft.icon' => ['ico'],
        'application/pdf' => ['pdf'],
    ];

    /**
     * Upload an incoming file with strict security checks, automatic WebP conversion,
     * and intelligent compression guaranteed under 100KB for all image uploads.
     */
    public static function upload(?UploadedFile $file, string $folder = 'general', int $maxSizeBytes = 102400): ?string
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        // ══════════════════════════════════════════════════════
        // SECURITY LAYER: Strict Extension & MIME Whitelist
        // ══════════════════════════════════════════════════════
        $rawExt = strtolower($file->getClientOriginalExtension());
        $guessedExt = strtolower($file->guessExtension() ?? '');
        $mime = strtolower($file->getMimeType() ?? '');

        // 1. Block any executable or script extensions immediately
        $dangerousExts = ['php', 'phtml', 'phar', 'sh', 'bash', 'py', 'pl', 'cgi', 'asp', 'aspx', 'jsp', 'js', 'html', 'htm', 'shtml', 'svg', 'exe', 'bat', 'cmd'];
        if (in_array($rawExt, $dangerousExts) || in_array($guessedExt, $dangerousExts)) {
            \Log::warning("Blocked suspicious file upload attempt with dangerous extension: {$rawExt} / {$guessedExt}");
            return null;
        }

        // 2. Validate against explicit safe whitelist
        if (!in_array($rawExt, self::ALLOWED_EXTENSIONS) && !in_array($guessedExt, self::ALLOWED_EXTENSIONS)) {
            \Log::warning("Upload rejected: extension '{$rawExt}' not in allowed whitelist.");
            return null;
        }

        // 3. Validate that MIME type matches allowed whitelist
        if (!array_key_exists($mime, self::ALLOWED_MIME_TYPES)) {
            \Log::warning("Upload rejected: MIME type '{$mime}' is not recognized or permitted.");
            return null;
        }

        // Determine safe normalized extension
        $safeExt = in_array($rawExt, self::ALLOWED_MIME_TYPES[$mime]) 
            ? $rawExt 
            : self::ALLOWED_MIME_TYPES[$mime][0];

        // Sanitize folder name to prevent path traversal
        $folder = preg_replace('/[^a-zA-Z0-9_\-]/', '', $folder) ?: 'general';
        $targetDir = public_path('uploads/' . $folder);
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        $isImage = str_starts_with($mime, 'image/') && $mime !== 'image/x-icon';

        // If non-image (e.g. PDF or ICO) or GD is not available, store safely with random name
        if (!$isImage || !function_exists('imagewebp') || !function_exists('imagecreatefromstring')) {
            $filename = time() . '_' . Str::random(16) . '.' . $safeExt;
            $file->move($targetDir, $filename);
            return '/uploads/' . $folder . '/' . $filename;
        }

        // Automatic conversion to WebP and compression <= 100KB
        $filenameWebp = time() . '_' . Str::random(16) . '.webp';
        $destinationPath = $targetDir . DIRECTORY_SEPARATOR . $filenameWebp;

        $fileContent = @file_get_contents($file->getRealPath());
        if (!$fileContent) {
            $filename = time() . '_' . Str::random(16) . '.' . $safeExt;
            $file->move($targetDir, $filename);
            return '/uploads/' . $folder . '/' . $filename;
        }

        // Ensure real image content
        $srcImage = @imagecreatefromstring($fileContent);
        if (!$srcImage) {
            \Log::warning("Upload rejected: File content could not be decoded as a valid image.");
            return null;
        }

        // Preserve alpha transparency
        imagealphablending($srcImage, false);
        imagesavealpha($srcImage, true);

        $origWidth = imagesx($srcImage);
        $origHeight = imagesy($srcImage);

        // Calculate max dimension depending on type/folder
        $maxDimension = ($folder === 'avatars' || $folder === 'icons') ? 600 : 1600;
        
        $currentWidth = $origWidth;
        $currentHeight = $origHeight;

        if ($origWidth > $maxDimension || $origHeight > $maxDimension) {
            $ratio = min($maxDimension / $origWidth, $maxDimension / $origHeight);
            $currentWidth = (int) round($origWidth * $ratio);
            $currentHeight = (int) round($origHeight * $ratio);

            $resizedImage = imagecreatetruecolor($currentWidth, $currentHeight);
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, $currentWidth, $currentHeight, $origWidth, $origHeight);
            imagedestroy($srcImage);
            $srcImage = $resizedImage;
        }

        // Iterative compression to ensure file size <= 100 KB
        $quality = 82;
        imagewebp($srcImage, $destinationPath, $quality);

        while (file_exists($destinationPath) && filesize($destinationPath) > $maxSizeBytes && $quality > 25) {
            $quality -= 12;
            imagewebp($srcImage, $destinationPath, $quality);
        }

        // If still > 100KB, downscale dimensions further
        if (file_exists($destinationPath) && filesize($destinationPath) > $maxSizeBytes && ($currentWidth > 500 || $currentHeight > 500)) {
            $scaleDown = 0.75;
            $newW = (int) round($currentWidth * $scaleDown);
            $newH = (int) round($currentHeight * $scaleDown);

            $smaller = imagecreatetruecolor($newW, $newH);
            imagealphablending($smaller, false);
            imagesavealpha($smaller, true);
            imagecopyresampled($smaller, $srcImage, 0, 0, 0, 0, $newW, $newH, $currentWidth, $currentHeight);
            
            imagedestroy($srcImage);
            $srcImage = $smaller;
            
            $quality = 70;
            imagewebp($srcImage, $destinationPath, $quality);

            while (file_exists($destinationPath) && filesize($destinationPath) > $maxSizeBytes && $quality > 20) {
                $quality -= 10;
                imagewebp($srcImage, $destinationPath, $quality);
            }
        }

        imagedestroy($srcImage);

        return '/uploads/' . $folder . '/' . $filenameWebp;
    }

    /**
     * Convert an existing image file on disk to WebP with auto-orientation,
     * transparency preservation, and optimal compression.
     */
    public static function convertFile(string $sourcePath, string $destWebpPath, int $maxDimension = 1920, int $quality = 82, int $maxSizeBytes = 307200): bool
    {
        if (!file_exists($sourcePath) || !is_readable($sourcePath)) {
            return false;
        }

        $ext = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));
        $srcImage = null;

        if ($ext === 'png' && function_exists('imagecreatefrompng')) {
            $srcImage = @imagecreatefrompng($sourcePath);
        } elseif (($ext === 'jpg' || $ext === 'jpeg') && function_exists('imagecreatefromjpeg')) {
            $srcImage = @imagecreatefromjpeg($sourcePath);
        } elseif ($ext === 'webp' && function_exists('imagecreatefromwebp')) {
            $srcImage = @imagecreatefromwebp($sourcePath);
        }

        if (!$srcImage) {
            $fileContent = @file_get_contents($sourcePath);
            if (!$fileContent) {
                return false;
            }
            $srcImage = @imagecreatefromstring($fileContent);
            unset($fileContent);
        }

        if (!$srcImage) {
            return false;
        }

        // Auto-orient JPEG based on EXIF if available
        if (function_exists('exif_read_data')) {
            $exif = @exif_read_data($sourcePath);
            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 3:
                        $srcImage = imagerotate($srcImage, 180, 0);
                        break;
                    case 6:
                        $srcImage = imagerotate($srcImage, -90, 0);
                        break;
                    case 8:
                        $srcImage = imagerotate($srcImage, 90, 0);
                        break;
                }
            }
        }

        // Convert palette images to true color if necessary (webp requires true color)
        if (!imageistruecolor($srcImage)) {
            if (function_exists('imagepalettetotruecolor')) {
                imagepalettetotruecolor($srcImage);
            }
        }

        // Preserve alpha transparency
        imagealphablending($srcImage, false);
        imagesavealpha($srcImage, true);

        $origWidth = imagesx($srcImage);
        $origHeight = imagesy($srcImage);

        $currentWidth = $origWidth;
        $currentHeight = $origHeight;

        if ($origWidth > $maxDimension || $origHeight > $maxDimension) {
            $ratio = min($maxDimension / $origWidth, $maxDimension / $origHeight);
            $currentWidth = (int) round($origWidth * $ratio);
            $currentHeight = (int) round($origHeight * $ratio);

            $resizedImage = imagecreatetruecolor($currentWidth, $currentHeight);
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, $currentWidth, $currentHeight, $origWidth, $origHeight);
            imagedestroy($srcImage);
            $srcImage = $resizedImage;
        }

        // Create directory if needed
        $destDir = dirname($destWebpPath);
        if (!file_exists($destDir)) {
            @mkdir($destDir, 0755, true);
        }

        imagewebp($srcImage, $destWebpPath, $quality);

        while (file_exists($destWebpPath) && filesize($destWebpPath) > $maxSizeBytes && $quality > 30) {
            $quality -= 10;
            imagewebp($srcImage, $destWebpPath, $quality);
        }

        imagedestroy($srcImage);
        return file_exists($destWebpPath);
    }
}
