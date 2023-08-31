<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Owner::query()->create([
            'name' => 'owner',
            'email' => 'owner@owner.owner',
            'password' => Hash::make('password')
        ]);
    }
}
