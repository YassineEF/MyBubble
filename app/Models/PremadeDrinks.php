<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremadeDrinks extends Model
{
    use HasFactory;

    protected $table = 'premadeDrinks'; 

    protected $primaryKey = 'id_premadeDrink';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public $timestamps = false;
}

