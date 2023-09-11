<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class OwnerIndexAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerIndexAction extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        /** @var EloquentCollection<int, Owner> $owners */
        $owners = Owner::query()->whereNull('deleted_at')
            ->get();

        return Inertia::render('Admin/Owner/Index', ['owners' => $owners]);
    }
}
