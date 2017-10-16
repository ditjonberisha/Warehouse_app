<?php

namespace App\Repository;
use App\Models\Enum\OrderStatusEnum;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mockery\Exception;

class OrderRepository
{
    public function getOrders($from = '', $to = '', $search = '')
    {
        $myShops = Auth::user()->myShops();
        $GLOBALS['search'] = strtolower($search);
        if(!empty($GLOBALS['search']))
        {
            $orders = Order::join('phones', 'orders.phone_id', '=', 'phones.id')->where(
                function($query) {
                    $query->where('phones.returnedOrderId', 'LIKE', "%{$GLOBALS['search']}%")
                        ->orWhere('phones.customer_email', 'LIKE', "%{$GLOBALS['search']}%")
                        ->orWhere('orders.status', 'LIKE', "{$GLOBALS['search']}")
                        ->orWhere('orders.soldOrderId', 'LIKE', "%{$GLOBALS['search']}%");
                }
            )
                ->whereIn('phones.shop_id', $myShops->pluck('id'))->select(['orders.*']);
        }
        else
        {
            $orders = Order::join('phones', 'orders.phone_id', '=', 'phones.id')
                ->whereIn('shop_id', $myShops->pluck('id'))->select(['orders.*']);
        }
        if(!empty($from) && !empty($to))
        {
            $orders = $orders->whereBetween('orders.created_at',
                [Carbon::createFromFormat('!d/m/Y', $from),
                    Carbon::createFromFormat('d/m/Y', $to)]);
        }
        elseif(!empty($from))
        {
            $orders = $orders->where('orders.created_at', '>=', Carbon::createFromFormat('!d/m/Y', $from));
        }
        elseif(!empty($to))
        {
            $orders = $orders->where('orders.created_at', '<=', Carbon::createFromFormat('d/m/Y', $to));
        }
        return $orders->get();
    }
    public function getOrder($order)
    {
        $myShops = Auth::user()->myShops();
        if(!in_array($order->phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            throw new \Exception('You do not have access');
        }
        return $order;
    }
    public function update($order, Request $request)
    {
        $myShops = $request->user()->myShops();
        $orderData = $request->toArray();
        if(!in_array($order->phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            return redirect()->back()->withErrors('You do not have access');
        }
        if($orderData['status'] == OrderStatusEnum::Sold && empty($orderData['soldOrderId']))
        {
            throw new \Exception('Please fill the sale order id');
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