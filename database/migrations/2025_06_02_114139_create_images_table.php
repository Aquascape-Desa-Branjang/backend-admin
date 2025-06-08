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
        Schema::create('images', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('order')->default(0);
            $table->string('image');
            $table->tinyInteger('type')->comment("0: 'About Hero Image', 1: 'Gallery'");
            $table->boolean('is_active')->default(true);
            $table->foreignUlid('created_by_id')->nullable()->constrained('main_admins');
            $table->foreignUlid('updated_by_id')->nullable()->constrained('main_admins');
            $table->foreignUlid('deleted_by_id')->nullable()->constrained('main_admins');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
