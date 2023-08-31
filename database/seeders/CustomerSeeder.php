<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Customer::query()->create([
            'name' => 'customer',
            'email' => 'customer@customer.customer',
            'password' => Hash::make('password')
        ]);
    }
}
