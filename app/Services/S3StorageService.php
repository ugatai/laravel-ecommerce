<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ImageServiceException;
use App\Services\Impl\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

/**
 * Class ImageService
 *
 * @package App\Services
 */
final class S3FileManagerService implements ImageServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function deleteImageFromS3(string $path): bool
    {
        if (!Storage::disk('s3')->exists($path)) {
            throw new ImageServiceException(
                __METHOD__,
                "[Error]: Attempted to delete a non-existent file in s3 buket. path: {$path}"
            );
        }

        return Storage::disk('s3')->delete($path);
    }

    /**
     * {@inheritDoc}
     */
    public function resizeImageFile(UploadedFile $file): Image
    {
        return new Image();
    }

    /**
     * {@inheritDoc}
     */
    public function uploadImageToS3(Image $image, string $path): string
    {
        return 'images/test/test.jpg';
    }
}
