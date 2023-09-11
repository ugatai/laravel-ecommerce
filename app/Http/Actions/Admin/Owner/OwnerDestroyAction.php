<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class OwnerDestroyAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerDestroyAction extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function __invoke(Request $request, int $id): RedirectResponse
    {
        /** @var Owner|null $owner */
        $owner = Owner::query()->find($id);

        if ($owner === null) {
            throw new ModelNotFoundException("Owner with ID {$id} not found.");
        }

        $owner->delete();

        return redirect()->route('admin.owner.index')
            ->with('alert', 'Owner delete successfully!');
    }
}
