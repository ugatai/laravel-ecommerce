<?php

declare(strict_types=1);

namespace App\Http\Actions\Admin\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class OwnerCreateAction
 *
 * @package App\Http\Actions\Admin\Owner
 */
final class OwnerCreateAction extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Admin/Owner/Create');
    }
}
