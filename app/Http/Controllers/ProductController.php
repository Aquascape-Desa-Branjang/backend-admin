<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json($products);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_category_ids' => 'nullable|array',
            'images' => 'required|array',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'required|string',
            'retail_price' => 'nullable|integer|min:0',
            'wholesale_prices' => 'nullable|array',
            'shopee_link' => 'nullable|string',
        ]);

        $product = Product::create([
            'id' => (string) Str::ulid(),
            'product_category_ids' => json_encode($data['product_category_ids'] ?? []),
            'images' => json_encode($data['images']),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'retail_price' => $data['retail_price'],
            'wholesale_prices' => json_encode($data['wholesale_prices'] ?? []),
            'shopee_link' => $data['shopee_link'],
        ]);

        return response()->json($product);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_category_ids' => 'nullable|array',
            'images' => 'required|array',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'required|string',
            'retail_price' => 'nullable|integer|min:0',
            'wholesale_prices' => 'nullable|array',
            'shopee_link' => 'nullable|string',
        ]);

        $product->update([
            'product_category_ids' => json_encode($data['product_category_ids'] ?? []),
            'images' => json_encode($data['images']),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'retail_price' => $data['retail_price'],
            'wholesale_prices' => json_encode($data['wholesale_prices'] ?? []),
            'shopee_link' => $data['shopee_link'],
        ]);

        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}