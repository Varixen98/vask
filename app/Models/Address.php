<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
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
        'street_address',
        'postal_code',
        'district_id',
        'city_id',
        'province_id',
        'is_default'
    ];
    

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
