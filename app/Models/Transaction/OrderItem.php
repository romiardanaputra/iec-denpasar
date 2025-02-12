<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_name',
        'price',
        'quantity',
    ];
}
