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
            $table->id();
            $table->foreignId('store_id');
            $table->foreignId('category_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->unsignedFloat('price');
            $table->unsignedBigInteger('in_stock')->default(0);
            $table->unsignedFloat('discount_precentage')->default(0);
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('rating')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->softDeletes();
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
