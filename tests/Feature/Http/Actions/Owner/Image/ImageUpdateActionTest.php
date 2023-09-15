<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Image;
use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
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
        Storage::fake('s3');

        $file = UploadedFile::fake()->image('test.jpg');
        $path = Storage::disk('s3')->putFile('images/test', $file);

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
    public function test_owner_update_action(): void
    {
        $data = [
            'id' => $this->image->id,
            'owner_id' => $this->owner->id,
            'title' => 'updated',
            'image' => UploadedFile::fake()->image('updated.jpg')
        ];

        $response = $this->actingAs($this->owner, 'owner')
            ->post(route('owner.image.update'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('owner.image.edit', ['id' => $this->image->id]));
        $response->assertSessionHas('info', 'Image updated successfully!');

        Storage::disk('s3')->assertMissing('images/test/test.jpg');

        $this->assertDatabaseHas('images', [
            'id' => $this->image->id,
            'owner_id' => $this->owner->id,
            'title' => 'updated'
        ]);
    }
}
