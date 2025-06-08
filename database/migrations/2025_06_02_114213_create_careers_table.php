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
        Schema::create('careers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->json('requirements');
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
        Schema::dropIfExists('careers');
    }
};
