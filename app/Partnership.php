<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{

    public function imgPartnerships( ){
        return $this->hasMany('App\ImgPartnership');
    }

    protected $fillable = [
        'partner', 'description', 
    ];
        
}
