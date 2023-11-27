<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public $table = 'sales';

    public $fillable = [
        'sales_date',
        'product_id',
        'sales_amount',
        'sales_amount',
        'sales_person_id'
    ];

    protected $casts = [
        'sales_date' => 'date',
        'product_id' => 'integer',
        'sales_amount' => 'string',
        'sales_amount' => 'string',
        'sales_person_id' => 'integer'
    ];

    public static array $rules = [
        'sales_date' => 'required',
        'product_id' => 'required',
        'sales_amount' => 'required',
        'sales_amount' => 'required',
        'sales_person_id' => 'required'
    ];

    
}
