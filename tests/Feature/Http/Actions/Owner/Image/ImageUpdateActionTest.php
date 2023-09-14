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

class ImageUpdateActionTest extends TestCase
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
        Storage::fake('s3');

        $this->owner = Owner::query()->first();
        $this->image = Image::query()->first();
    }

    #[Test]
    /**
     * @return void
     * @throws JsonException
     */
    public function test_owner_update_action(): void
    {
        $data = [
            'owner_id' => $this->owner->id,
            'title' => 'updated',
            'file_path' => 'images/test/update_test.jpg'
        ];

        $response = $this->actingAs($this->owner, 'owner')
            ->put(route('owner.image.update'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('owner.image.edit', ['id' => $this->image->id]));
        $response->assertSessionHas('info', 'Image updated successfully!');

        $this->assertDatabaseHas('images', $data);
        Storage::disk('s3')->assertExists('images/test/update_test.jpg');

        Storage::disk('s3')->assertMissing($this->image->file_path);
    }
}
