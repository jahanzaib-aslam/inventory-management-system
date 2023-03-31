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
            $table->string('name');
            $table->boolean('has_variant')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('image');
            $table->string('description', 5000);
            $table->bigInteger('purchase_type_id')->unsigned();
            $table->string('Brand')->nullable();
            $table->string('shop')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('product_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('purchase_type_id')->references('id')->on('purchase_type');
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