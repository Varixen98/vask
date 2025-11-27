<?php

namespace App\Models;

use App\Models\Province;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;

class City extends Model
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
        'province_id',
        'name'
    ];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function districts(){
        return $this->hasMany(District::class);
    }
}
