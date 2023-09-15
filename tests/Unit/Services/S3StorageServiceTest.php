<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Exceptions\S3StorageServiceException;
use App\Services\Impl\S3StorageServiceInterface;
use App\Services\S3StorageService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Class S3StorageServiceTest
 *
 * @package Tests\Unit\Services
 */
class S3StorageServiceTest extends TestCase
{
    public S3StorageService $s3StorageService;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('s3');
        $this->s3StorageService = $this->app[S3StorageServiceInterface::class];
    }

    /**
     * @return void
     * @throws S3StorageServiceException
     */
    #[Test]
    public function test_delete(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');
        $path = Storage::disk('s3')->putFile('images/test', $file);
        $result = $this->s3StorageService
            ->delete($path);

        $this->assertTrue($result);
        Storage::disk('s3')->assertMissing($path);
    }

    /**
     * @return void
     * @throws S3StorageServiceException
     */
    #[Test]
    public function test_delete_with_non_existent_path(): void
    {
        $this->expectException(S3StorageServiceException::class);
        $this->expectExceptionMessage("[Error]: Attempted to delete a non-existent file in s3 buket. path: image/test/non_existent.jpg");
        $this->expectExceptionCode(404);

        $this->s3StorageService
            ->delete('image/test/non_existent.jpg');
    }

    /**
     * @return void
     * @throws S3StorageServiceException
     */
    #[Test]
    public function test_resize_image_file(): void
    {
        $file = UploadedFile::fake()->image('test.jpg', 9999, 9999);
        $resizedImage = $this->s3StorageService
            ->resizeImageFile($file);

        $this->assertSame(1920, $resizedImage->width());
        $this->assertSame(1080, $resizedImage->height());
    }

    /**
     * @return void
     * @throws S3StorageServiceException
     */
    #[Test]
    public function test_resize_image_file_not_permit_mime_type(): void
    {
        $this->expectException(S3StorageServiceException::class);
        $this->expectExceptionMessage('[Error]: Incorrect file extension detected. mime: application/x-php');
        $this->expectExceptionCode(415);

        $file = UploadedFile::fake()->image('test.php');
        $this->s3StorageService
            ->resizeImageFile($file);
    }

    /**
     * @return void
     * @throws S3StorageServiceException
     */
    #[Test]
    public function test_upload(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');
        $path = $this->s3StorageService
            ->upload('images/test', $file);

        Storage::disk('s3')->assertExists($path);
    }
}
