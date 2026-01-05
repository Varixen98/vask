<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    use HasFactory;
    /**
     * 
     * 
     * 
     * 
     */
    protected $fillable = [
        'user_id',
        'totebag_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function totebag(){
        return $this->belongsTo(Totebag::class);
    }
}
