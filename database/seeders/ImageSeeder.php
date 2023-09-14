<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Image::query()->create([
            'owner_id' => 1,
            'title' => 'sample_1',
            'file_path' => 'https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/test/cosmetics-6345792_1920.jpg'
        ]);

        Image::query()->create([
            'owner_id' => 1,
            'title' => 'sample_2',
            'file_path' => 'https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/test/essential-oils-1433694_1920.jpg'
        ]);

        Image::query()->create([
            'owner_id' => 1,
            'title' => 'sample_3',
            'file_path' => 'https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/test/hygiene-870763_1920.jpg'
        ]);

        Image::query()->create([
            'owner_id' => 1,
            'title' => 'sample_4',
            'file_path' => 'https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/test/oil-discharge-2794477_1920.jpg'
        ]);

        Image::query()->create([
            'owner_id' => 1,
            'title' => 'sample_5',
            'file_path' => 'https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/test/shampoo-827141_1920.jpg'
        ]);
    }
}
