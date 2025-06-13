<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\HasManyJson;

class ProductCategory extends Model
{
    use HasFactory, HasUlids, HasJsonRelationships;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'order',
        'name',
        'slug',
    ];

    public function products(): HasManyJson
    {
        return $this->hasManyJson(ProductCategory::class, 'product_category_ids');
    }
}
