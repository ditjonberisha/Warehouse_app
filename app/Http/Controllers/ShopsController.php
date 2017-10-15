<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ShopRepository;
use App\Models\Shop;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
        $this->repo = new ShopRepository();
    }

    public function index(Request $request)
    {
        $shops = $request->user()->myShops()->where('active', 1)->get();
        return view('shops.index', compact('shops'));
    }
    public function show($id)
    {
        try
        {
            $shop = Shop::findOrFail($id);
            return view('shops.show', compact('shop'));
        }
        catch(Exception $exception)
        {
        }

    }
    public function create()
    {
        return view('shops.create');
    }
    public function store(Request $request)
    {
        try
        {
            $this->repo->insert($request);
            return redirect('shops');
        }
        catch(Exception $exception)
        {

        }
    }
    public function edit($id)
    {
        try
        {
            $shop = Shop::findOrFail($id);
            return view('shops.edit', compact('shop'));
        }
        catch (\Exception $ex)
        {
            return redirect('shops')->withErrors($ex->getMessage());
        }

    }
    public function update($id, Request $request)
    {
        try
        {
            $this->repo->update($id, $request);
            return redirect('shops');
        }
        catch (\Exception $ex)
        {
            return redirect('shops')->withErrors($ex->getMessage());
        }
    }
    public function destroy($id)
    {
        try
        {
            $this->repo->delete($id);
            return redirect('shops');
        }
        catch (\Exception $ex)
        {
            return redirect('shops')->withErrors($ex->getMessage());
        }
    }
}
