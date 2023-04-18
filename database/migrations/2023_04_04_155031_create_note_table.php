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
        Schema::create('note', function (Blueprint $table) {
            $table->id('id_note');
            $table->timestamps();
            $table->string('name');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id_product')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note');
    }
};
