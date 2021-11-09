<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title', 'src', 'alt', 'description', 'is_visible', 'slug'
    ];
}
