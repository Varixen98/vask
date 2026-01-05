<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'totebag_id',
        'quantity',
        'price' // The price at the moment of purchase
    ];

    // RELATIONSHIPS

    // This item belongs to a specific Order
    public function order(){
        return $this->belongsTo(Order::class);
    }

    // This item is a specific Totebag (Product)
    // We need this to get the image_url and name for the history page
    public function totebag(){
        return $this->belongsTo(Totebag::class);
    }
}