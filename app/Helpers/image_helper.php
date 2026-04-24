<?php

if (!function_exists('compress_to_webp')) {
    /**
     * Compress an uploaded image to WebP format.
     *
     * @param \CodeIgniter\HTTP\Files\UploadedFile $file The uploaded file object
     * @param string $destination The directory to save the file (must end with slash)
     * @param int $quality Compression quality (1-100)
     * @param int|null $maxWidth Max width for resizing (optional)
     * @return string|bool The new filename on success, false on failure
     */
    function compress_to_webp($file, $destination, $quality = 80, $maxWidth = 1200)
    {
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return false;
        }

        // Check if it's an image
        $mime = $file->getMimeType();
        if (!str_starts_with($mime, 'image/')) {
            return false;
        }

        // Skip SVG as it's vector and doesn't need WebP compression in the same way
        if ($mime === 'image/svg+xml') {
            $newName = $file->getRandomName();
            $file->move($destination, $newName);
            return $newName;
        }

        // Generate a unique name with .webp extension
        $name = $file->getRandomName();
        $nameOnly = pathinfo($name, PATHINFO_FILENAME);
        $newName = $nameOnly . '.webp';

        // Ensure destination directory exists
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        // Temporary path for original file
        $tempPath = $file->getTempName();

        // Initialize Image service
        $image = \Config\Services::image();

        try {
            // Load the image
            $imgHandler = $image->withFile($tempPath);

            // Get original dimensions
            $width = $imgHandler->getWidth();

            // Resize if exceeds maxWidth
            if ($maxWidth && $width > $maxWidth) {
                $imgHandler->resize($maxWidth, 0, true); // true = maintain aspect ratio
            }

            // Save as WebP
            // Providing .webp extension in the save path tells CI4 to convert it
            $imgHandler->save($destination . $newName, $quality);

            return $newName;
        } catch (\Exception $e) {
            log_message('error', '[ImageHelper] Compression failed for ' . $file->getName() . ': ' . $e->getMessage());
            
            // Fallback: just move the original file if compression fails
            try {
                $newName = $file->getRandomName();
                $file->move($destination, $newName);
                return $newName;
            } catch (\Exception $moveEx) {
                return false;
            }
        }
    }
}
