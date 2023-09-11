<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\Owner;

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use JsonException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OwnerDestroyActionTest extends TestCase
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
     * @throws JsonException
     */
    public function test_owner_delete_action(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.owner.destroy', ['id' => $this->owner->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.owner.index'));
        $response->assertSessionHas('alert', 'Owner delete successfully!');

        $this->assertSoftDeleted($this->owner);
    }

    #[Test]
    /**
     * @return void
     */
    public function test_owner_delete_action_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.owner.destroy', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
