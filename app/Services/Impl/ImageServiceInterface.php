<?php

declare(strict_types=1);

namespace App\Services\Impl;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Image;

/**
 * Interface ImageServiceInterface
 *
 * @package App\Services\Impl
 */
interface ImageServiceInterface
{
    /**
     * @param string $path
     * @return void
     */
    public function deleteImageFromS3(string $path): void;

    /**
     * @param UploadedFile $file
     * @return Image
     */
    public function resizeImageFile(UploadedFile $file): Image;

    /**
     * @param Image $image
     * @param string $path
     * @return string
     */
    public function uploadImageToS3(Image $image, string $path): string;
}
