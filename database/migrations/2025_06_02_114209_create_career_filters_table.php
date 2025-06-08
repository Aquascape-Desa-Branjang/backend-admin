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
        Schema::create('career_filters', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->tinyInteger('type')->comment("0: 'Location', 1: 'Division'");
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreignUlid('created_by_id')->nullable()->constrained('main_admins');
            $table->foreignUlid('updated_by_id')->nullable()->constrained('main_admins');
            $table->foreignUlid('deleted_by_id')->nullable()->constrained('main_admins');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_filters');
    }
};
