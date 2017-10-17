<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ShopRepository;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin'])->except('index');
        $this->repo = new ShopRepository();
    }

    public function index(Request $request)
    {
        $shops = Auth::user()->myShops();

        return view('shops.index', compact('shops'));
    }

    public function show(Shop $shop)
    {
        return view('shops.show', compact('shop'));
    }

    public function create()
    {
        $users = User::where('role', 'manager')->get();

        return view('shops.create', compact('users'));
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate(Shop::rules);
            $this->repo->insert($request);

            return redirect('shops');
        }
        catch(Exception $exception)
        {
            return redirect()->back()->withInput($request->all())->withErrors($exception->getMessage());
        }
    }

    public function edit(Shop $shop)
    {
        $users = User::where('role', 'manager')->get();

        return view('shops.edit', compact('shop','users'));
    }

    public function update(Shop $shop, Request $request)
    {
        try
        {
            $request->validate(Shop::rules);
            $this->repo->update($shop, $request);

            return redirect('shops');
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withInput($request->all())->withErrors($ex->getMessage());
        }
    }

    public function destroy(Shop $shop)
    {
        try
        {
            $shop->delete();
            return redirect('shops');
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
