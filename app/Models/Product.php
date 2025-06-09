<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false; // karena ID-nya bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_category_ids',
        'images',
        'name',
        'slug',
        'description',
        'retail_price',
        'wholesale_prices',
        'shopee_link',
    ];

    protected $casts = [
        'product_category_ids' => 'array',
        'images' => 'array',
        'wholesale_prices' => 'array',
        'retail_price' => 'integer',
    ];

}
