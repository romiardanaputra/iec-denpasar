<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $priimaryKey = 'id';

    protected $guarded = ['id'];

    public $fillable = [
        'order_id',
        'snap_token',
        'amount',
        'status',
        'expired_at',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'double',
        'expired_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
