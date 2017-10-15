<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Repository\PhoneRepository;
use Mockery\Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Enum\PhoneConditionEnum;

class PhonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repo = new PhoneRepository();
    }

    public function index(Request $request)
    {
        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        $phones = $this->repo->getPhones($request, $myShops);
        $search = $request->search;
        return view('phones.index', compact('phones', 'search'));
    }
    public function show($id)
    {
        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        $phone = Phone::findOrFail($id);
        if(!in_array($phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            throw new \Exception('You do not have access');
        }
        return view('phones.show', compact('phone'));
    }
    public function create()
    {
        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        return view('phones.create',compact('myShops'));
    }
    public function store(Request $request)
    {
        try
        {
            $myShops = Auth::user()->myShops()->where('active', 1)->get();
            $this->repo->insert($request, $myShops);
            return redirect('phones');
        }
        catch(Exception $exception)
        {
            throw new \Exception('Gabim.');
        }
    }
    public function edit($id)
    {

        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        $phone = Phone::findOrFail($id);
        if(!in_array($phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            throw new \Exception('You do not have access');
        }
        return view('phones.edit', compact('phone','myShops'));
    }
    public function update($id, Request $request)
    {
        try
        {
            $shops = Auth::user()->myShops()->where('active', 1)->get();
            $this->repo->update($id, $request, $shops);
            return redirect('phones')->with('Phone updated successfullu');
        }
        catch(Exception $exception)
        {
            throw new \Exception('Gabim.');
        }
    }
    public function destroy($id)
    {
        try
        {
            $myShops = Auth::user()->myShops()->where('active', 1)->get();
            $this->repo->delete($id, $myShops);
            return redirect('phones');
        }
        catch(Exception $exception)
        {
            return redirect('phones')->withErrors($exception->getMessage());
        }
    }
}
