<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
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
        'name'
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }
}
