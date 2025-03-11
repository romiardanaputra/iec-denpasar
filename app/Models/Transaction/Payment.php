<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'snap_token',
        'amount',
        'status',
        'expired_at',
        'paid_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
