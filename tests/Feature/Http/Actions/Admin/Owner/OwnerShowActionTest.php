<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\Owner;

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\Assert;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OwnerShowActionTest extends TestCase
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

        $this->admin = Admin::query()->find(1);
        $this->owner = Owner::query()->find(1);
    }

    #[Test]
    /**
     * @return void
     */
    public function test_owner_show_page(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.owner.show', ['id' => $this->owner->id]));

        $response->assertInertia(fn(Assert $page) => $page->component('Admin/Owner/Show')
            ->has('owner')
        );
    }
}
