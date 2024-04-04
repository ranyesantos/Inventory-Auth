<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Item::create([
                'name' => 'Item ' . $i,
                'category' => 'Categoria ' . $i,
                'description' => 'Descrição do item ' . $i,
            ]);
        }
    }
}
