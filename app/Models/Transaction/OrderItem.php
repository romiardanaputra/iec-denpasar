<?php

namespace App\Models\Transaction;

use App\Models\Program\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_items';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'order_id',
        'program_id',
        'price',
        'quantity',
    ];

    protected $casts = [
        'price' => 'double',
        'quantity' => 'integer',
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
