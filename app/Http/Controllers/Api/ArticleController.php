<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Log;
use KodePandai\ApiResponse\ApiResponse;

class ArticleController extends Controller
{
    public function index(): ApiResponse
    {
        $response = new ApiResponse;
        $message = 'Gagal mengambil data artikel';
        $statusCode = '500';
        $data = [];

        try {
            $data = Article::latest()
                ->get(['id', 'image', 'title', 'slug', 'description', 'created_at'])
                ->map(function ($article) {
                    $article->image_url = $article->image_url;
                    return $article;
                });

            $message = 'Data artikel berhasil diambil';
            $statusCode = '200';
            $response = $response->success();
        } catch (\Exception $e) {
            Log::error('Error fetching articles', ['error' => $e->getMessage()]);
            $response = $response->error();
        }

        return $response
            ->title('API Artikel')
            ->message($message)
            ->statusCode($statusCode)
            ->data($data);
    }

    public function show(string $slug): ApiResponse
    {
        $response = new ApiResponse;
        $message = 'Artikel tidak ditemukan';
        $statusCode = '404';
        $data = [];

        try {
            $article = Article::slug($slug)
                ->firstOrFail(['id', 'image', 'title', 'slug', 'description', 'created_at']);
            
            $article->image_url = $article->image_url;

            $message = 'Detail artikel berhasil diambil';
            $statusCode = '200';
            $data = $article;
            $response = $response->success();
        } catch (\Exception $e) {
            Log::error('Error fetching article by slug', ['slug' => $slug, 'error' => $e->getMessage()]);
            $response = $response->error();
        }

        return $response
            ->title('API Detail Artikel')
            ->message($message)
            ->statusCode($statusCode)
            ->data($data);
    }
}
