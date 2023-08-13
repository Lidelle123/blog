<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "TECHNOLOGY",
            'description' => null,
        ]);

        Category::create([
            'name' => "SPORT",
            'description' => null,
        ]);

        Category::create([
            'name' => "HEALTH",
            'description' => null,
        ]);

        Category::create([
            'name' => "POLITICS",
            'description' => null,
        ]);

        Category::create([
            'name' => "CULTURE",
            'description' => null,
        ]);
    }
}
