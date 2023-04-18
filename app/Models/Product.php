<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Product
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_product';
    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];
    public $timestamps = false;

}
