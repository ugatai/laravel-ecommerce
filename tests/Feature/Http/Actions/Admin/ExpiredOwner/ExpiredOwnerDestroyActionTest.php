<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\ExpiredOwner;

use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use JsonException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ExpiredOwnerDestroyActionTest extends TestCase
{
    use RefreshDatabase;

    private Admin|null $admin;
    private Owner|null $expiredOwner;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
        Artisan::call('db:seed', ['--class' => 'ExpiredOwnerSeeder']);

        $this->admin = Admin::query()->first();
        $this->expiredOwner = Owner::query()->first();
    }

    #[Test]
    /**
     * @return void
     * @throws JsonException
     */
    public function test_expired_owner_delete_action(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.expired_owner.destroy', ['id' => $this->expiredOwner->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.expired_owner.index'));
        $response->assertSessionHas('alert', 'Expired owner delete successfully!');

        $this->assertModelMissing($this->expiredOwner);
    }

    #[Test]
    /**
     * @return void
     */
    public function test_expired_owner_delete_action_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.expired_owner.destroy', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
