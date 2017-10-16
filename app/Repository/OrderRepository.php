<?php

namespace App\Repository;
use App\Models\Enum\OrderStatusEnum;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public function getOrders(Request $request)
    {
        $myShops = Auth::user()->myShops();
        $GLOBALS['search'] = $request->search;
        if(!empty($GLOBALS['search']))
        {
            $orders = Order::join('phones', 'phones.id', '=', 'orders.phone_id')->where(
                function($query) {
                    $query->where('phones.returnedOrderId', 'LIKE', "%{$GLOBALS['search']}%")
                        ->orWhere('phones.customer_email', 'LIKE', "%{$GLOBALS['search']}%")
                        ->orWhere('orders.status', 'LIKE', "%{$GLOBALS['search']}%")
                        ->orWhere('orders.soldOrderId', 'LIKE', "%{$GLOBALS['search']}%");
                }
            )
                ->whereIn('phones.shop_id', $myShops->pluck('id')->toArray())->get();
        }
        else
        {
            $products_all = Phone::whereIn('shop_id', $myShops->pluck('id')->toArray())->get();
            $orders = Order::whereIn('phone_id', $products_all->pluck('id')->toArray())->get();
        }
        if(!empty($request->from) && !empty($request->from) )
        {
            $orders = $orders->where('orders.created_at', '=>', $request->from);
        }
        if(!empty($request->to))
        {
            $orders = $orders->where('orders.created_at', '<=', $request->to);
        }
        return $orders;
    }
    public function getOrder($order)
    {
        $myShops = Auth::user()->myShops();
        if(!in_array($order->phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            return redirect()->back()->withErrors('You do not have access');
        }
        return $order;
    }
    public function update($order, Request $request)
    {
        $myShops = $request->user()->myShops();
        $orderData = $request->toArray();
        if(!in_array($order->phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            return redirect()->back()->withInput()->withErrors('You do not have access');
        }
        if($orderData['status'] == OrderStatusEnum::Sold && empty($orderData['soldOrderId']))
        {
            return redirect()->back()->withInput()->withErrors('Please fill the sale order id');
        }
        $orderData['status'] = strtolower(OrderStatusEnum::getValue($orderData['status']));
        $order->update($orderData);
    }
    public function delete($order)
    {
        $order->phone()->dissociate();
        $order->forceDelete();
    }
}

?>