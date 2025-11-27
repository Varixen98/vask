<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    /**
     * 
     * 
     * @var list<int,string>
     * 
     */
    protected $fillable = [
        'id',
        'city_id',
        'name'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
