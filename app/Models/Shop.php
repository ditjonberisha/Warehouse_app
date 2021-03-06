<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'country', 'city', 'active'];

    const rules =
        [
            'name' => 'required',
            'country' => 'required|alpha',
            'city'  => 'required|alpha',
        ];

    public function phones()
    {
        return $this->hasMany('App\Models\Phone');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function delete()
    {
        $this->phones()->delete();
        return parent::delete();
    }
}
