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
        Schema::create('order_popping_product', function (Blueprint $table) {
            $table->id('id_order_popping_product');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('popping_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('order_id')->references('id_order')->on('order');
            $table->foreign('popping_id')->references('id_popping')->on('popping');
            $table->foreign('product_id')->references('id_product')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_popping_product');
    }
};
