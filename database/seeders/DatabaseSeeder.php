<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use App\Models\Message;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Message::factory(50)->create();

        // Crear marcas
        Brand::factory(10)->create();

        // Crear categorías
        Category::factory(10)->create();

        // Crear productos y asignar categorías y marcas
        Product::factory(50)->create()->each(function ($product) {
            // Asignar una categoría aleatoria
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);

            // Asignar imágenes aleatorias
            $images = Image::factory(rand(1, 3))->create();
            $product->images()->attach($images->pluck('id'));
        });      
        
        Order::factory()->count(50)->create();

    }
}
