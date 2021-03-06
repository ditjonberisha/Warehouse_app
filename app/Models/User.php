<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shops()
    {
        return $this->belongsToMany('App\Models\Shop');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function myShops()
    {
        if ($this->role == 'admin')
        {
            return DB::table('shops')->get();
        }
        else
        {
            return $this->shops()->get();
        }
    }

    public function myOrders()
    {
        if ($this->role == 'admin')
        {
            return DB::table('orders')->get();
        }
        else
        {
            return $this->orders()->get();
        }
    }

    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function delete()
    {
        $this->orders()->delete();
        return parent::delete();
    }
}
