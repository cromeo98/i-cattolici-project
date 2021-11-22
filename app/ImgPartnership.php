<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgPartnership extends Model
{
    public function partnership(){
        return $this->belongsTo('App\Partnership');
    }

    protected $fillable = [
        'img'
    ];
}
