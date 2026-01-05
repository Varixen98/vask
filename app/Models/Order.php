<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_method',
        'shipping_address'
    ];

    // RELATIONSHIPS

    // An order belongs to one user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // An order has many items inside it
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}