<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    /**
     * 
     * 
     * @var list<mixed,int>
     * 
     */
    protected $fillable = [
        'user_id',
        'totebag_id',
        'quantity',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function totebag(){
        return $this->belongsTo(Totebag::class);
    }
}
