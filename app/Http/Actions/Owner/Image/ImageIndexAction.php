<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class ImageIndexAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageIndexAction extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        /** @var Collection<int, EloquentCollection<int, Image>> $chunkedImages */
        $chunkedImages = Image::query()->whereNull('deleted_at')
            ->get()
            ->chunk(3);

        return Inertia::render('Owner/Image/Index', ['chunkedImages' => $chunkedImages]);
    }
}
