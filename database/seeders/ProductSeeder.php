<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les catégories existantes
        $categories = Category::all()->keyBy('name');

        $products = [
            [
                'name' => 'Ordinateur Portable HP',
                'description' => 'Un ordinateur performant pour le travail et les loisirs.',
                'price' => 749.99,
                'image' => 'hp-laptop.jpg',
                'category' => 'Informatique',
            ],
            [
                'name' => 'Fauteuil Scandinave',
                'description' => 'Fauteuil confortable pour le salon.',
                'price' => 129.99,
                'image' => 'fauteuil.jpg',
                'category' => 'Maison et Jardin',
            ],
            [
                'name' => 'T-shirt Bio Homme',
                'description' => 'T-shirt 100% coton bio pour homme.',
                'price' => 19.99,
                'image' => 'tshirt.jpg',
                'category' => 'Mode',
            ],
            [
                'name' => 'Tapis de Yoga Antidérapant',
                'description' => 'Tapis idéal pour les exercices de yoga ou pilates.',
                'price' => 29.90,
                'image' => 'yoga.jpg',
                'category' => 'Sports et Loisirs',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'id' => \Str::uuid(),
                'name' => $product['name'],
                'slug' => \Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'category_id' => $categories[$product['category']]->id ?? null,
            ]);
        }
    }
}
