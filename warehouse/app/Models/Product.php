<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'created_at',
        'updated_at',
        'category_id',
        'status_id',
        'transaction_id'
    ];
}

