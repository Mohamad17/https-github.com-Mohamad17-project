<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function allOrder()
    {
        $orders= Order::orderBy('created_at', 'desc')->simplePaginate(30);
        return view('admin.market.order.allOrder', compact('orders'));
    }

    public function newOrders()
    {
        $orders= Order::where('order_status', 0)->orderBy('created_at', 'desc')->simplePaginate(20);
        $title= 'جدید';
        foreach($orders as $order){
            $order->order_status=1;
            $order->save();
        }
        return view('admin.market.order.type-order', compact('orders', 'title'));
    }

    public function sending()
    {
        $orders= Order::where('delivery_status', 1)->orderBy('created_at', 'desc')->simplePaginate(20);
        $title= 'در حال ارسال';
        return view('admin.market.order.type-order', compact('orders', 'title'));
    }

    public function unpaid()
    {
        $orders= Order::where('payment_status', 0)->orderBy('created_at', 'desc')->simplePaginate(20);
        $title= 'پرداخت نشده';
        return view('admin.market.order.type-order', compact('orders', 'title'));
    }

    public function canceled()
    {
        $orders= Order::where('order_status', 4)->orderBy('created_at', 'desc')->simplePaginate(20);
        $title= 'باطل شده';
        return view('admin.market.order.type-order', compact('orders', 'title'));
    }

    public function returned()
    {
        $orders= Order::where('order_status', 5)->orderBy('created_at', 'desc')->simplePaginate(20);
        $title= 'برگشت داده شده';
        return view('admin.market.order.type-order', compact('orders', 'title'));
    }

    public function sendStatus()
    {
        
        return view('admin.market.order.allOrder');
    }

    public function orderStatus()
    {
        
        return view('admin.market.order.allOrder');
    }

    public function cancelOrder()
    {
        
        return view('admin.market.order.allOrder');
    }
    
    public function showOrder()
    {
        return view('admin.market.order.allOrder', compact('orders', 'title'));
    }
}
