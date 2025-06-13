<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->json('product_category_ids')->nullable();
            $table->json('images');
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->unsignedBigInteger('retail_price')->nullable();
            $table->json('wholesale_prices')->nullable();
            $table->string('shopee_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
