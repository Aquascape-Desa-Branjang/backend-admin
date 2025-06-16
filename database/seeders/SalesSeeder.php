<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sales;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command->error('No products found. ProductSeeder might not have run properly.');

            return;
        }

        foreach (range(1, 20) as $i) {
            $product = $products->random();

            Sales::create([
                'id' => (string) Str::ulid(),
                'product_id' => $product->id,
                'image' => fake()->imageUrl(),
                'stock' => rand(1, 100),
                'created_at' => fake()->dateTimeBetween('-60 days', 'now'),
            ]);
        }
    }
}
