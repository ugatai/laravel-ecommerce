<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\ExpiredOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ExpiredOwnerDestroyAction
 *
 * @package App\Http\Actions\Admin\ExpiredOwner
 */
final class ExpiredOwnerDestroyAction extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function __invoke(Request $request, int $id): RedirectResponse
    {
        return redirect()->route('admin.expired_owner.index')
            ->with('alert', 'Owner delete successfully!');
    }
}
