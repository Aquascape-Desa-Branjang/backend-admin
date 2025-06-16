<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Sales extends Model
{
    use HasFactory, HasJsonRelationships, HasUlids;

    protected $fillable = [
        'id',
        'product_id',
        'stock',
        'revenue',
        'created_at',
    ];

    protected $casts = [
        'revenue' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function ($sale) {
            if ($sale->product && $sale->stock !== null) {
                $sale->revenue = $sale->product->retail_price * $sale->stock;
            }
        });
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
