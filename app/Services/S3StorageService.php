<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\S3StorageServiceException;
use App\Services\Impl\S3StorageServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as InterventionImage;
use Intervention\Image\Image;
use function in_array;

/**
 * Class S3StorageService
 *
 * @package App\Services
 */
final class S3StorageService implements S3StorageServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function delete(string $path): bool
    {
        if (! Storage::disk('s3')->exists($path)) {
            throw new S3StorageServiceException(
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
        $permitMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];

        if (! in_array($file->getMimeType(), $permitMimes, true)) {
            throw new S3StorageServiceException(
                __METHOD__,
                "[Error]: Incorrect file extension detected. mime: {$file->getMimeType()}",
                415
            );
        }

        return InterventionImage::make($file)
            ->resize(1920, 1080)
            ->encode();
    }

    /**
     * {@inheritDoc}
     */
    public function upload(string $path, UploadedFile $file): string
    {
        $dateTime = Carbon::now()->format('YmdHis');
        $randomStr = Str::random(12);
        $fileName = "/{$dateTime}_{$randomStr}.{$file->extension()}";

        $resizedImage = $this->resizeImageFile($file);

        Storage::disk('s3')->put($path . $fileName, (string)$resizedImage, 'public');

        return config('services.s3.url') . $path . $fileName;
    }
}
