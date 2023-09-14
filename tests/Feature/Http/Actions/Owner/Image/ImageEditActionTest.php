<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Image;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageEditActionTest extends TestCase
{
    use RefreshDatabase;

    private Owner|null $owner;
    private Image|null $image;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'OwnerSeeder']);
        Artisan::call('db:seed', ['--class' => 'ImageSeeder']);

        $this->owner = Owner::query()->first();
        $this->image = Image::query()->first();
    }

    #[Test]
    /**
     * @return void
     */
    public function test_image_edit_page(): void
    {
        $response = $this->actingAs($this->owner, 'owner')
            ->get(route('owner.image.edit', ['id' => $this->image->id]));

        $response->assertInertia(fn(AssertableInertia $page) => $page->component('Owner/Image/Edit')
            ->has('image')
            ->where('image.id', $this->image->id)
        );
    }

    #[Test]
    /**
     * @return void
     */
    public function test_image_edit_page_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->owner, 'owner')
            ->get(route('owner.image.edit', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
