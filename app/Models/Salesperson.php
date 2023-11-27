<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    public $table = 'salespeople';

    public $fillable = [
        'sales_person_name',
        'address',
        'contact'
    ];

    protected $casts = [
        'sales_person_name' => 'string',
        'address' => 'string',
        'contact' => 'string'
    ];

    public static array $rules = [
        'sales_person_name' => 'required',
        'address' => 'required',
        'contact' => 'required'
    ];

    
}
