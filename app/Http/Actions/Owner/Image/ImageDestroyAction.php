<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Exceptions\S3StorageServiceException;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Services\Impl\S3StorageServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ImageDestroyAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageDestroyAction extends Controller
{
    public readonly S3StorageServiceInterface $s3StorageService;

    /**
     * @param S3StorageServiceInterface $s3StorageService
     */
    public function __construct(S3StorageServiceInterface $s3StorageService)
    {
        $this->s3StorageService = $s3StorageService;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws S3StorageServiceException
     */
    public function __invoke(Request $request, int $id): RedirectResponse
    {
        /** @var Image|null $image */
        $image = Image::query()->find($id);

        if ($image === null) {
            throw new ModelNotFoundException("Image with ID {$id} not found.");
        }

        $path = str_replace(config('services.s3.url'), '', $image->file_path);
        $this->s3StorageService
            ->delete($path);

        $image->delete();

        return redirect()->route('owner.image.index')
            ->with('alert', 'Image delete successfully!');
    }
}
