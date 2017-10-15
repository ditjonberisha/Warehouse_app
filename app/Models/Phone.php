<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['customer_name', 'customer_email','IMEI1', 'IMEI2',
        'EAN', 'condition', 'description','shop_id', 'returnedOrderId'];

    protected $rules =
        [
            'IMEI1' => 'required|numeric|min:3',
            'IMEI2' => 'required|numeric|min:3',
            'EAN'  => 'required',
            'condition' => 'required',
            'description' => 'required',
            'shop_id' => 'required',
            'customer_name' => 'required',
            'customer_email' => 'required',
        ];

    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
}
