<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Actions\Owner\Image;

use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use JsonException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageStoreActionTest extends TestCase
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
        Storage::fake('s3');

        $this->owner = Owner::query()->first();
    }

    /**
     * @return void
     * @throws JsonException
     */
    #[Test]
    public function test_image_store_action(): void
    {
        $data = [
            'owner_id' => $this->owner->id,
            'title' => 'test_file',
            'image' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($this->owner, 'owner')
            ->post(route('owner.image.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('owner.image.index'));
        $response->assertSessionHas('info', 'image created successfully!');

        $this->assertDatabaseHas('images', [
            'owner_id' => $this->owner->id,
            'title' => 'test_file'
        ]);
    }
}
