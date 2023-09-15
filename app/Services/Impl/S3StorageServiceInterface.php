<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Exceptions\S3StorageServiceException;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Image;

/**
 * Interface S3StorageServiceInterface
 *
 * @package App\Services\Impl
 */
interface S3StorageServiceInterface
{
    /**
     * @param string $path
     * @return bool
     * @throws S3StorageServiceException
     */
    public function delete(string $path): bool;

    /**
     * @note 画像ファイルのサイズを1920×1080に変更
     * @param UploadedFile $file
     * @return Image
     * @throws S3StorageServiceException
     */
    public function resizeImageFile(UploadedFile $file): Image;

    /**
     * @note ランダムなファイル名を生成してからS3ストレージへファイルをアップロード
     * @param string $path
     * @param UploadedFile $file
     * @return string
     * @throws S3StorageServiceException
     */
    public function upload(string $path, UploadedFile $file): string;
}
