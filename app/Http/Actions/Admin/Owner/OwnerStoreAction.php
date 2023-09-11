<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Owner\OwnerStoreRequest;
use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class OwnerStoreAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerStoreAction extends Controller
{
    /**
     * @param OwnerStoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(OwnerStoreRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $hashedPass = Hash::make($attributes['password']);
        $attributes['password'] = $hashedPass;

        Owner::query()->create($attributes);

        return redirect()->route('admin.owner.index')
            ->with('info', 'Owner created successfully!');
    }
}
