<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryService
{
    public function uploadFile($file, string $folder): ?string
    {
        try {
            $uploaded = Cloudinary::uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder' => $folder,
                    'verify' => false,
                ]
            );

            return $uploaded['secure_url'] ?? null;
        } catch (\Throwable $e) {
            return null;
        }
    }


    public function destroyByUrl(?string $secureUrl): bool
    {
        if (empty($secureUrl) || !str_starts_with($secureUrl, 'http') || !str_contains($secureUrl, 'res.cloudinary.com')) {
            return false;
        }

        $publicId = $this->extractPublicId($secureUrl);
        if (!$publicId) {
            return false;
        }

        try {
            Cloudinary::uploadApi()->destroy($publicId, ['invalidate' => true]);
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function extractPublicId(string $secureUrl): ?string
    {
        $parts = parse_url($secureUrl);
        if (!isset($parts['path'])) {
            return null;
        }

        $path = ltrim($parts['path'], '/');
        $segments = explode('/', $path);

        $uploadPos = array_search('upload', $segments);
        if ($uploadPos === false) {
            $publicPath = implode('/', $segments);
        } else {
            $publicPath = implode('/', array_slice($segments, $uploadPos + 1));
        }

        $publicPath = preg_replace('/^v\d+\//', '', $publicPath);
        $publicPath = preg_replace('/\.[^\.]+$/', '', $publicPath);

        return $publicPath ?: null;
    }
}
