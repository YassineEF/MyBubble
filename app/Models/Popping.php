<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Popping
 */
class Popping extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'popping';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_popping';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'image'
    ];
    public $timestamps = false;
}
