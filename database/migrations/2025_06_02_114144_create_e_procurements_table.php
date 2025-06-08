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
        Schema::create('e_procurements', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->char('number');
            $table->string('name');
            $table->string('working_unit');
            $table->string('procurement_method');
            $table->string('evaluation_method');
            $table->string('winning_vendor');
            $table->string('url');
            $table->string('attachment');
            $table->boolean('status')->comment("true: 'Open', false: 'Close'");
            $table->bigInteger('ceiling_budget')->default(0);
            $table->date('announcement_date')->default(now());
            $table->date('closing_date')->default(now());
            $table->boolean('is_active');
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
        Schema::dropIfExists('e_procurements');
    }
};
