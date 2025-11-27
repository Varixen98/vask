<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Totebag extends Model
{

    use HasFactory;
    //
    /**
     * 
     * 
     * @var list<int,string>
     * 
     */
    protected $fillable = [
        'item_name',
        'description',
        'material',
        'price',
        'image_url'
    ];

    public function colors(){
        return $this->hasMany(Color::class);
    }


}
