<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'soldOrderId'];

    public function phone()
    {
        return $this->belongsTo('App\Models\Phone');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
