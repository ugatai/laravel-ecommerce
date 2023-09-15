<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Exceptions\S3StorageServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\Image\ImageUpdateRequest;
use App\Models\Image;
use App\Services\Impl\S3StorageServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

/**
 * Class ImageUpdateAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageUpdateAction extends Controller
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
     * @param ImageUpdateRequest $request
     * @return RedirectResponse
     * @throws S3StorageServiceException
     */
    public function __invoke(ImageUpdateRequest $request): RedirectResponse
    {
        $id = (int)$request->validated('id');

        /** @var Image|null $image */
        $image = Image::query()->find($id);

        if ($image === null) {
            throw new ModelNotFoundException("Image with ID {$id} not found.");
        }

        $path = str_replace(config('services.s3.url'), '', $image->file_path);
        $this->s3StorageService
            ->delete($path);

        $attributes = $request->validated();
        $attributes['file_path'] = $this->s3StorageService
            ->upload('images/ecommerce', $attributes['image']);

        $image->fill($attributes)
            ->save();

        return redirect()->route('owner.image.edit', ['id' => $image->id])
            ->with('info', 'Image updated successfully!');
    }
}
