<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    public $fillable = [
        'product_name',
        'price'
    ];

    protected $casts = [
        'product_name' => 'string',
        'price' => 'string'
    ];

    public static array $rules = [
        'product_name' => 'required',
        'price' => 'required'
    ];

    
}
