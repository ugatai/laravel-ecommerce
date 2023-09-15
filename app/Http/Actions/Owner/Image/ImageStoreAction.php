<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Exceptions\S3StorageServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\Image\ImageStoreRequest;
use App\Models\Image;
use App\Services\Impl\S3StorageServiceInterface;
use Illuminate\Http\RedirectResponse;

/**
 * Class ImageStoreAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageStoreAction extends Controller
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
     * @param ImageStoreRequest $request
     * @return RedirectResponse
     * @throws S3StorageServiceException
     */
    public function __invoke(ImageStoreRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
        $attributes['file_path'] = $this->s3StorageService
            ->upload('images/ecommerce', $attributes['image']);

        Image::query()->create($attributes);

        return redirect()->route('owner.image.index')
            ->with(['info' => 'image created successfully!']);
    }
}
