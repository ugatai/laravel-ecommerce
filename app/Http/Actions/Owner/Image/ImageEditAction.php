<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
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
        return Inertia::render('Owner/Image/Edit');
    }
}
