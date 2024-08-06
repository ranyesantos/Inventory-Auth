<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\factory as faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Faker::create();

        User::factory()->create([
            'name' => 'Test User',
            'admin' => 1,
            'email' => 'test@example.com',
            'password' => Hash::make('12345'),
        ]);

        for ($i = 1; $i <= 30; $i++) {
            Item::create([
                'name' => 'Item ' . $i,
                'description' => $faker->paragraph(),
                'price' => $faker->numberBetween(100, 3999),
                'sell' => $faker->boolean(),
            ]);

        }

    }
}
