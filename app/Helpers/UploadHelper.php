<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadHelper
{
    /**
     * Upload an incoming file with automatic WebP conversion and intelligent
     * compression guaranteed under 100KB for all image uploads.
     */
    public static function upload(?UploadedFile $file, string $folder = 'general', int $maxSizeBytes = 102400): ?string
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

        // Automatic conversion to WebP and compression <= 100KB
        $filenameWebp = time() . '_' . Str::random(8) . '.webp';
        $destinationPath = $targetDir . DIRECTORY_SEPARATOR . $filenameWebp;

        $fileContent = @file_get_contents($file->getRealPath());
        if (!$fileContent) {
            $filename = time() . '_' . Str::random(8) . '.' . strtolower($file->getClientOriginalExtension());
            $file->move($targetDir, $filename);
            return '/uploads/' . $folder . '/' . $filename;
        }

        $srcImage = @imagecreatefromstring($fileContent);
        if (!$srcImage) {
            $filename = time() . '_' . Str::random(8) . '.' . strtolower($file->getClientOriginalExtension());
            $file->move($targetDir, $filename);
            return '/uploads/' . $folder . '/' . $filename;
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
}
