<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    use HasFactory;
    //
    /**
     * 
     * 
     * @var List<int,string>
     * 
     */
    protected $fillable = [
        'totebag_id',
        'name',
        'hex_code'
    ];

    public function totebag(){
        return $this->belongsTo(Totebag::class);
    }
}
