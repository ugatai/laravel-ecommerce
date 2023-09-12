<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Owner;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ExpiredOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Owner::query()->create([
            'name' => 'expired_owner1',
            'email' => 'expired_owner1@owner.owner',
            'password' => Hash::make('password'),
            'deleted_at' => Carbon::now()->subDays(5)
        ]);

        Owner::query()->create([
            'name' => 'expired_owner2',
            'email' => 'expired_owner2@owner.owner',
            'password' => Hash::make('password'),
            'deleted_at' => Carbon::now()->subDays(10)
        ]);

        Owner::query()->create([
            'name' => 'expired_owner3',
            'email' => 'expired_owner3@owner.owner',
            'password' => Hash::make('password'),
            'deleted_at' => Carbon::now()->subDays(15)
        ]);
    }
}
