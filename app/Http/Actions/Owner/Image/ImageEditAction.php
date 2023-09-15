<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class ImageEditAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageEditAction extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function __invoke(Request $request, int $id): Response
    {
        /** @var Image|null $image */
        $image = Image::query()->find($id);

        if ($image === null) {
            throw new ModelNotFoundException("Image with ID {$id} not found.");
        }

        return Inertia::render('Owner/Image/Edit', ['image' => $image]);
    }
}
