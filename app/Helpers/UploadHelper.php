<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadHelper
{
    /**
     * Upload an incoming file with automatic WebP conversion and intelligent
     * compression guaranteed with high visual fidelity and compact file size.
     */
    public static function upload(?UploadedFile $file, string $folder = 'general', int $maxSizeBytes = 307200): ?string
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $targetDir = public_path('uploads/' . $folder);
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        $mime = strtolower($file->getMimeType() ?? '');
        $isImage = str_starts_with($mime, 'image/') && !str_contains($mime, 'svg');

        // If not an image or SVG, store directly
        if (!$isImage || !function_exists('imagewebp') || !function_exists('imagecreatefromstring')) {
            $filename = time() . '_' . Str::random(8) . '.' . strtolower($file->getClientOriginalExtension());
            $file->move($targetDir, $filename);
            return '/uploads/' . $folder . '/' . $filename;
        }

        // Automatic conversion to WebP
        $filenameWebp = time() . '_' . Str::random(8) . '.webp';
        $destinationPath = $targetDir . DIRECTORY_SEPARATOR . $filenameWebp;

        $maxDim = ($folder === 'avatars' || $folder === 'icons') ? 600 : 1920;
        $success = static::convertFile($file->getRealPath(), $destinationPath, $maxDim, 82, $maxSizeBytes);

        if ($success && file_exists($destinationPath)) {
            return '/uploads/' . $folder . '/' . $filenameWebp;
        }

        // Fallback to direct move if conversion fails
        $filename = time() . '_' . Str::random(8) . '.' . strtolower($file->getClientOriginalExtension());
        $file->move($targetDir, $filename);
        return '/uploads/' . $folder . '/' . $filename;
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

        // Downscale if exceeds max dimension
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

        // Make sure destination directory exists
        $destDir = dirname($destWebpPath);
        if (!file_exists($destDir)) {
            @mkdir($destDir, 0755, true);
        }

        // Encode to WebP
        imagewebp($srcImage, $destWebpPath, $quality);

        // If file size exceeds target threshold, incrementally decrease quality down to 40
        $curQuality = $quality;
        while (file_exists($destWebpPath) && filesize($destWebpPath) > $maxSizeBytes && $curQuality > 40) {
            $curQuality -= 8;
            imagewebp($srcImage, $destWebpPath, $curQuality);
        }

        imagedestroy($srcImage);
        return file_exists($destWebpPath);
    }
}
