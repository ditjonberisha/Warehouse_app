<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function phone()
    {
        return $this->belongsTo('App\Models\Phone');
    }
}
