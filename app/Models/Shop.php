<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'country', 'city', 'active'];

    protected $rules =
        [
            'name' => 'required',
            'country' => 'required',
            'city'  => 'required',
            'active' => 'required'
        ];

    public function phones()
    {
        return $this->hasMany('App\Models\Phone');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
