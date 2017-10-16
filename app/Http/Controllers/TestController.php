<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enum\OrderStatusEnum;
use App\Models\Enum\PhoneConditionEnum;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TestController extends Controller
{
    public function test()
    {
        $user = new User();
        $user->name = 'manager';
        $user->email = 'manager@gmail.com';
        $user->password = bcrypt('12345678');
        $user->role = 'manager';
        $user->save();

        return $user;
    }
}
