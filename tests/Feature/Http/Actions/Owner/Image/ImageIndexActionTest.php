<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageIndexActionTest extends TestCase
{
    use RefreshDatabase;

    private Owner|null $owner;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'OwnerSeeder']);

        $this->owner = Owner::query()->first();
    }

    /**
     * @return void
     */
    #[Test]
    public function test_owner_index_page(): void
    {
        $response = $this->actingAs($this->owner, 'owner')
            ->get(route('owner.image.index'));

        $response->assertInertia(fn(AssertableInertia $page) => $page->component('Owner/Image/Index')
            ->has('chunkedImages')
        );
    }
}
