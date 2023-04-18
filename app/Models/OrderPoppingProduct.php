<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPoppingProduct extends Model
{
    use HasFactory;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_popping_product';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_order_popping_product';

    protected $fillable = [
        'order_id',
        'product_id',
        'popping_id'
    ];

    public $timestamps = false;

}
