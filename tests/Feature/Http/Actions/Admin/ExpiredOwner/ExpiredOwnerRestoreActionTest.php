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

class ExpiredOwnerRestoreActionTest extends TestCase
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
        $this->expiredOwner = Owner::onlyTrashed()->first();
    }

    #[Test]
    /**
     * @return void
     * @throws JsonException
     */
    public function test_expired_owner_restore_action(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.expired_owner.restore', ['id' => $this->expiredOwner->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.owner.index'));
        $response->assertSessionHas('info', 'Expired owner restore successfully!');

        $this->assertDatabaseHas('owners', [
            'id' => $this->expiredOwner->id,
            'deleted_at' => null
        ]);
    }

    #[Test]
    /**
     * @return void
     */
    public function test_expired_owner_restore_action_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.expired_owner.restore', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
