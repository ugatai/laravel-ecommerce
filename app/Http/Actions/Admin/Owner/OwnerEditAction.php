<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class OwnerEditAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerEditAction extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function __invoke(Request $request, int $id): Response
    {
        /** @var Owner|null $owner */
        $owner = Owner::query()->find($id);

        if ($owner === null) {
            throw new ModelNotFoundException("Owner with ID {$id} not found.");
        }

        return Inertia::render('Admin/Owner/Edit', ['owner' => $owner]);
    }
}
