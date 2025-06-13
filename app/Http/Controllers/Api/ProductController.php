<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;
use KodePandai\ApiResponse\ApiResponse;

class ProductController extends Controller
{
    public function products(): ApiResponse
    {
        $response = new ApiResponse;
        $message = 'An error occurred while fetching products';
        $statusCode = '500';
        $data = [];

        try {
            $data = Product::latest()->with('productCategories')->get();
            $message = 'Products fetched successfully';
            $statusCode = '200';

            $response = $response->success();
        } catch (\Exception $e) {
            Log::error('Error fetching home products', ['error' => $e->getMessage()]);

            $response = $response->error();

        }

        return $response
            ->title('API Products')
            ->message($message)
            ->statusCode($statusCode)
            ->data($data);
    }

    public function productCategories(): ApiResponse
    {
        $response = new ApiResponse;
        $message = 'An error occurred while fetching product categories';
        $statusCode = '500';
        $data = [];

        try {
            $data = ProductCategory::orderBy('order', 'asc')->get();
            $message = 'Product Categories fetched successfully';
            $statusCode = '200';

            $response = $response->success();
        } catch (\Exception $e) {
            Log::error('Error fetching home product categories', ['error' => $e->getMessage()]);

            $response = $response->error();

        }

        return $response
            ->title('API Product Categories')
            ->message($message)
            ->statusCode($statusCode)
            ->data($data);
    }
}
