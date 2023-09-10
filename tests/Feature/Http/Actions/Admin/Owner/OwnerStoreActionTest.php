<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Admin\Owner;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use JsonException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OwnerStoreActionTest extends TestCase
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

        $this->admin = Admin::query()->find(1);
    }

    #[Test]
    /**
     * @return void
     * @throws JsonException
     */
    public function test_owner_store_action(): void
    {
        $data = [
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => 'password'
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.owner.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.owner.index'));

        $this->assertDatabaseHas('owners', [
            'name' => 'test',
            'email' => 'test@test.test'
        ]);
    }
}
