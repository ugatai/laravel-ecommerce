<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Impl\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Image;

/**
 * Class ImageService
 *
 * @package App\Services
 */
final class ImageService implements ImageServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function deleteImageFromS3(string $path): void
    {

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
