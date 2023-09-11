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

class OwnerUpdateActionTest extends TestCase
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
    public function test_owner_update_action(): void
    {
        $data = [
            'id' => $this->owner->id,
            'name' => 'updated',
            'email' => 'updated@updated.updated'
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->put(route('admin.owner.update'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.owner.edit', ['id' => $this->owner->id]));
        $response->assertSessionHas('info', 'Owner updated successfully!');

        $this->assertDatabaseHas('owners', $data);
    }
}
