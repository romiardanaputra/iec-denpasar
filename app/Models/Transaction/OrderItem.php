<?php

namespace App\Models\Transaction;

use App\Models\Program\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'program_id',
        'price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
