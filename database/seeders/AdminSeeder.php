<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Admin::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('password')
        ]);
    }
}
