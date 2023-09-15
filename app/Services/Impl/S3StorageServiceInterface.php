<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Exceptions\ImageServiceException;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Image;

/**
 * Interface S3FileManagerInterface
 *
 * @package App\Services\Impl
 */
interface S3FileManagerServiceInterface
{
    /**
     * @param string $path
     * @return bool
     * @throws ImageServiceException
     */
    public function delete(string $path): bool;

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
    public function upload(Image $image, string $path): string;
}
