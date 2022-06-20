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

    public function sendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status=1;
                $order->save();
                break;
            case 1:
                $order->delivery_status=2;
                $order->save();
                break;
            case 2:
                $order->delivery_status=3;
                $order->save();
                break;
            default:
                $order->delivery_status=0;
                $order->save();
                break;
        }
        return back()->with('swal-success', 'وضعیت تحویل سفارش با موفقیت تغییر یافت');
    }

    public function orderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 0:
                $order->order_status=1;
                $order->save();
                break;
            case 1:
                $order->order_status=2;
                $order->save();
                break;
            case 2:
                $order->order_status=3;
                $order->save();
                break;
            case 3:
                $order->order_status=4;
                $order->save();
                break;
            case 4:
                $order->order_status=5;
                $order->save();
                break;
            default:
                $order->order_status=0;
                $order->save();
                break;
        }
        return back()->with('swal-success', 'وضعیت سفارش با موفقیت تغییر یافت');
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status=4;
        $order->save();
        return back()->with('swal-danger', 'سفارش باطل شد');
    }
    
    public function showOrder(Order $order)
    {
        return view('admin.market.order.show', compact('order'));
    }

    public function details(Order $order)
    {
        $items= $order->items;
        return view('admin.market.order.details', compact('order', 'items'));
    }
}
