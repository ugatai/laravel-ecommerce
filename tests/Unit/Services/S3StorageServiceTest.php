<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Exceptions\ImageServiceException;
use App\Services\ImageService;
use App\Services\Impl\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImageServiceTest extends TestCase
{
    public readonly ImageService $imageService;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('s3');
        $this->imageService = $this->app[ImageServiceInterface::class];
    }

    /**
     * @return void
     * @throws ImageServiceException
     */
    #[Test]
    public function test_delete_image_from_s3(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');
        $path = Storage::disk('s3')->putFile('images/test', $file);
        $result = $this->imageService
            ->deleteImageFromS3($path);

        $this->assertTrue($result);
        Storage::disk('s3')->assertMissing($path);
    }

    /**
     * @return void
     * @throws ImageServiceException
     */
    #[Test]
    public function test_delete_image_from_s3_with_non_existent_path(): void
    {
        $this->expectException(ImageServiceException::class);
        $this->expectExceptionMessage("[Error]: Attempted to delete a non-existent file in s3 buket. path: image/test/non_existent.jpg");
        $this->expectExceptionCode(404);

        $this->imageService
            ->deleteImageFromS3('image/test/non_existent.jpg');
    }

    /**
     * @return void
     */
    #[Test]
    public function test_resize_image_file(): void
    {
        $file = UploadedFile::fake()->image('test.jpg', 9999, 9999);
        $resizedImage = $this->imageService
            ->resizeImageFile($file);

        $this->assertSame(1920, $resizedImage->width());
        $this->assertSame(1080, $resizedImage->height());
    }

    /**
     * @return void
     */
    #[Test]
    public function test_upload_image_to_s3(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');
        $resizedImage = $this->imageService
            ->resizeImageFile($file);
        $path = $this->imageService
            ->uploadImageToS3($resizedImage, 'images/test');

        Storage::disk('s3')->assertExists($path);
    }
}
