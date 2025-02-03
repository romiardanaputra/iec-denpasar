<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'order_id',
        'total_price',
        'status',
        'payment_status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // public function users()
    // {
    //   return $this->hasMany(User::class);
    // }

}
