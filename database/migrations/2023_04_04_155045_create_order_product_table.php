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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id('id_order_product');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();
            $table->integer('sugar');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('order_id')->references('id_order')->on('order');
            $table->foreign('product_id')->references('id_product')->on('product');
            $table->foreign('size_id')->references('id_size')->on('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
