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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->float('cost_price');
            $table->float('Break-even');
            $table->float('final_price');
            $table->float('sale_price');
            $table->integer('quantity');
            $table->boolean('is_active');
            $table->string('description', 5000);
            $table->timestamps();
        });

        Schema::table('product_variants', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_varients');
    }
};