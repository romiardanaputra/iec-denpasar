<?php

namespace App\Models\Transaction;

use App\Models\Program\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'registration_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
