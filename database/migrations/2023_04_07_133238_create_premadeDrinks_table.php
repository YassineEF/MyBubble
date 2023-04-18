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
        Schema::create('premadeDrinks', function(Blueprint $table){
            $table->id('id_premadeDrink'); 
            $table->boolean('isLimited'); 
            $table->string('name'); 
            $table->longText('description'); 
            $table->float('price'); 
            $table->string('image'); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premadeDrinks'); 
    }
};
