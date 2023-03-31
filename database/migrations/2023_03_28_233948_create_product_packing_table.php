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
        Schema::create('product_packing', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('packing_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('product_packing', function($table) {
            $table->foreign('packing_id')->references('id')->on('packings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_packing');
    }
};
