<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Shop;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onStock = Auth::user()->myOrders()->where('status', 'on stock')->count();
        $beingRepaired = Auth::user()->myOrders()->where('status', 'being repaired')->count();
        $toBeSold = Auth::user()->myOrders()->where('status', 'to be sold')->count();
        $sold= Auth::user()->myOrders()->where('status', 'sold')->count();

        return view('home.index', compact('onStock', 'beingRepaired', 'toBeSold', 'sold'));
    }
}
