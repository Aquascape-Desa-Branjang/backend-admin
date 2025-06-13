<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson;

class Product extends Model
{
    use HasFactory, HasUlids, HasJsonRelationships;

    public $incrementing = false; // karena ID-nya bukan auto-increment

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_category_ids',
        'image',
        'name',
        'slug',
        'description',
        'retail_price',
        'wholesale_prices',
        'shopee_link',
    ];

    protected $casts = [
        'product_category_ids' => 'json',
        'images' => 'array',
        'wholesale_prices' => 'array',
        'retail_price' => 'integer',
    ];

    public function getProductCategoryModelsAttribute()
    {
        return ProductCategory::whereIn('id', $this->product_category_ids ?? [])->get();
    }

    /**
     * Get the productCategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategories(): BelongsToJson
    {
        return $this->belongsToJson(ProductCategory::class, 'product_category_ids');
    }
}
