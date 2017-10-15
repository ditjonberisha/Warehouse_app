<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OrderRepository;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repo = new OrderRepository();
    }
    public function index(Request $request)
    {
        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        $orders = $this->repo->getOrders($request, $myShops);
        $search = $request->search;
        $from = $request->from;
        $to = $request->to;
        return view('orders.index', compact('orders', 'from', 'to', 'search'));
    }
    public function show($id)
    {
        $myShops = Auth::user()->myShops()->where('active', 1)->get();
        $order = $this->repo->getOrder($id, $myShops);
        return view('orders.show', compact('order'));
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }
    public function update($id, Request $request)
    {
        try
        {
            $this->repo->update($id, $request);
            return redirect('orders');
        }
        catch(Exception $exception)
        {
            return redirect('orders')->withErrors($exception->getMessage());
        }
    }
    public function destroy($id)
    {
        try
        {
            $this->repo->delete($id);
            return redirect('orders');
        }
        catch (\Exception $ex)
        {
            return redirect('orders')->withErrors($ex->getMessage());
        }
    }
}
