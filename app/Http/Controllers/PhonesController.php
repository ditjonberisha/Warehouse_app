<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Repository\PhoneRepository;
use Mockery\Exception;
use Illuminate\Support\Facades\Auth;

class PhonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repo = new PhoneRepository();
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $phones = $this->repo->getPhones($search);

        return view('phones.index', compact('phones', 'search'));
    }

    public function show(Phone $phone)
    {
        $myShops = Auth::user()->myShops();
        if(!in_array($phone->shop_id, $myShops->pluck('id')->toArray()))
            return redirect()->back()->withErrors('You do not have access');

        return view('phones.show', compact('phone'));
    }

    public function create()
    {
        $myShops = Auth::user()->myShops();

        return view('phones.create',compact('myShops'));
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate(Phone::rules);
            $this->repo->insert($request);

            return redirect('phones');
        }
        catch(Exception $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(Phone $phone)
    {
        $myShops = Auth::user()->myShops();
        if(!in_array($phone->shop_id, $myShops->pluck('id')->toArray()))
            return redirect()->back()->withErrors('You do not have access');

        return view('phones.edit', compact('phone','myShops'));
    }

    public function update(Phone $phone, Request $request)
    {
        try
        {
            $request->validate(Phone::rules);
            $this->repo->update($phone, $request);

            return redirect('phones')->with('Phone updated successfully');
        }
        catch(Exception $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Phone $phone)
    {
        try
        {
            $this->repo->delete($phone);

            return redirect('phones');
        }
        catch(Exception $exception)
        {
            return redirect('phones')->withErrors($exception->getMessage());
        }
    }
}
