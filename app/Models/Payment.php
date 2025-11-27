<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Payment extends Model
{
    //
    /**
     * 
     * 
     * @var list<int,string>
     * 
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'card_number',
        'last_four',
        'cvv',
        'expire_date',
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean'
    ];

    public function setCardNumberAttribute($value){
        $this->attributes['card_number'] = Crypt::encryptString($value);

        $this->attributes['last_four'] = substr($value, -4);
    }

    public function setCvvAttribute($value){
        $this->attributes['cvv'] = Crypt::encryptString($value);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
