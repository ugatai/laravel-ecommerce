<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Owner\OwnerUpdateRequest;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

/**
 * Class OwnerUpdateAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerUpdateAction extends Controller
{
    /**
     * @param OwnerUpdateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(OwnerUpdateRequest $request): RedirectResponse
    {
        $id = (int)$request->validated('id');

        /** @var Owner|null $owner */
        $owner = Owner::query()->find($id);

        if ($owner === null) {
            throw new ModelNotFoundException("Owner with ID {$id} not found.");
        }

        $owner->fill($request->validated())
            ->save();

        return redirect()->route('admin.owner.edit', ['id' => $id]);
    }
}
