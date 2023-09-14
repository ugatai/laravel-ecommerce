<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageCreateActionTest extends TestCase
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

    #[Test]
    /**
     * @return void
     */
    public function test_image_create_page(): void
    {
        $response = $this->actingAs($this->owner, 'owner')
            ->get(route('owner.image.create'));

        $response->assertInertia(fn(AssertableInertia $page) => $page->component('Owner/Image/Create'));
    }
}
