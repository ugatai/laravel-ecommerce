<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\Owner;

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OwnerEditActionTest extends TestCase
{
    use RefreshDatabase;

    private Admin|null $admin;
    private Owner|null $owner;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
        Artisan::call('db:seed', ['--class' => 'OwnerSeeder']);

        $this->admin = Admin::query()->first();
        $this->owner = Owner::query()->first();
    }

    #[Test]
    /**
     * @return void
     */
    public function test_owner_edit_page(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.owner.edit', ['id' => $this->owner->id]));

        $response->assertInertia(fn(AssertableInertia $page) => $page->component('Admin/Owner/Edit')
            ->has('owner')
            ->where('owner.id', $this->owner->id)
        );
    }

    #[Test]
    /**
     * @return void
     */
    public function test_owner_edit_page_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.owner.edit', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
