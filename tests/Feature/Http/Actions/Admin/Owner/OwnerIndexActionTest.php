<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\Owner;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OwnerIndexActionTest extends TestCase
{
    use RefreshDatabase;

    private Admin|null $admin;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'AdminSeeder']);

        $this->admin = Admin::query()->first();
    }

    #[Test]
    /**
     * @return void
     */
    public function test_owner_index_page(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.owner.index'));

        $response->assertInertia(fn(AssertableInertia $page) => $page->component('Admin/Owner/Index')
            ->has('owners')
        );
    }
}
