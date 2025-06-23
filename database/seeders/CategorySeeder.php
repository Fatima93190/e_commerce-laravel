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
// CategorySeeder.php
// ...
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Informatique',
                'description' => 'Ordinateurs, périphériques et accessoires.',
            ],
            [
                'name' => 'Maison et Jardin',
                'description' => 'Mobilier et décoration pour la maison et le jardin.',
            ],
            [
                'name' => 'Mode',
                'description' => 'Vetements, chaussures et accessoires de mode.',
            ],
            [
                'name' => 'Sports et Loisirs',
                'description' => 'Equipements sportifs.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'id' => \Str::uuid(), // generate a unique UUID
                'name' => $category['name'],
                'slug' => \Str::slug($category['name']), // slugify the name
                'description' => $category['description'],
            ]);
        }
    }
}
