<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return Inertia::render('Owner/Image/Index');
    }
}
