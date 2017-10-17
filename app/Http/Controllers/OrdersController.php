<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OrderRepository;
use App\Models\Order;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repo = new OrderRepository();
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $from = $request->from;
        $to = $request->to;
        $orders = $this->repo->getOrders($from, $to, $search);

        return view('orders.index', compact('orders', 'from', 'to', 'search'));
    }

    public function show(Order $order)
    {
        try
        {
            $order = $this->repo->getOrder($order);
        }
        catch(\Exception $ex)
        {
            return redirect('orders')->withErrors($ex->getMessage());
        }

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        try
        {
            $this->repo->update($order, $request);

            return redirect('orders');
        }
        catch(\Exception $exception)
        {
            return redirect("/orders/$order->id/edit")->withErrors($exception->getMessage());
        }
    }

    public function destroy(Order $order)
    {
        try
        {
            $this->repo->delete($order);
            
            return redirect('orders');
        }
        catch (\Exception $ex)
        {
            return redirect('orders')->withErrors($ex->getMessage());
        }
    }
}
