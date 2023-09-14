<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ImageDestroyAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageDestroyAction extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function __invoke(Request $request, int $id): RedirectResponse
    {
        return redirect()->route('owner.dashboard');
    }
}
