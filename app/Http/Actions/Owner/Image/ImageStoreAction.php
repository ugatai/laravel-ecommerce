<?php

declare(strict_types=1);

namespace App\Http\Actions\Owner\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ImageStoreAction
 *
 * @package App\Http\Actions\Owner\Image
 */
final class ImageStoreAction extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        return redirect()->route('owner.dashboard');
    }
}
