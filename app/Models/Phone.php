<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['customer_name', 'customer_email','IMEI1', 'IMEI2',
        'EAN', 'condition', 'description','shop_id', 'returnedOrderId'];

    const rules =
        [
            'customer_name' => 'required|alpha',
            'customer_email' => 'required|email',
            'IMEI1' => 'required|numeric|min:3',
            'IMEI2' => 'required|numeric|min:3',
            'EAN'  => 'required',
            'returnedOrderId' => 'required',
            'shop_id' => 'required',
            'condition' => 'required',
            'description' => 'required',
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
    public function delete()
    {
        $this->order()->delete();
        $this->photos()->delete();
        return parent::delete();
    }
}
