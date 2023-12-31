<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Image;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use JsonException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageDestroyActionTest extends TestCase
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
        Storage::fake('s3');

        $this->owner = Owner::query()->first();
        $this->image = Image::query()->create([
            'owner_id' => $this->owner->id,
            'title' => 'test',
            'file_path' => 'images/test/test.jpg'
        ]);
    }

    /**
     * @return void
     * @throws JsonException
     */
    #[Test]
    public function test_image_delete_action(): void
    {
        $response = $this->actingAs($this->owner, 'owner')
            ->delete(route('owner.image.destroy', ['id' => $this->image->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('owner.image.index'));
        $response->assertSessionHas('alert', 'Image delete successfully!');

        $this->assertSoftDeleted($this->image);
        Storage::disk('s3')->assertMissing($this->image->file_path);
    }

    /**
     * @return void
     */
    #[Test]
    public function test_image_delete_action_with_non_existent_id(): void
    {
        $nonExistentId = 9999;

        $response = $this->actingAs($this->owner, 'owner')
            ->delete(route('owner.image.destroy', ['id' => $nonExistentId]));
        $response->assertStatus(404);
    }
}
