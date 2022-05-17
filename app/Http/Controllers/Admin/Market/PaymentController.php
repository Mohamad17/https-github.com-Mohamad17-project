<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Payment\CashPayment;
use App\Models\Payment\OfflinePayment;
use App\Models\Payment\OnlinePayment;
use App\Models\Payment\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments= Payment::orderBy('created_at', 'desc')->simplePaginate(25);
        return view('admin.market.payment.index', compact('payments'));
    }

    public function show(Payment $payment){
        return view('admin.market.payment.show', compact('payment'));
    }

    public function online(){
        $title= "آنلاین";
        $payments= Payment::where('paymentable_type', 'App\Models\Payment\OnlinePayment')->orderBy('created_at', 'desc')->simplePaginate(25);
        return view('admin.market.payment.type.index', compact('payments', 'title'));
    }
    public function offline(){
        $title= "آفلاین";
        $payments= Payment::where('paymentable_type', 'App\Models\Payment\OfflinePayment')->orderBy('created_at', 'desc')->simplePaginate(25);
        return view('admin.market.payment.type.index', compact('payments', 'title'));
    }
    public function cash(){
        $title= "پرداخت در محل";
        $payments= Payment::where('paymentable_type', 'App\Models\Payment\CashPayment')->orderBy('created_at', 'desc')->simplePaginate(25);
        return view('admin.market.payment.type.index', compact('payments', 'title'));
    }
    public function confirm(){
        
    }
    public function cancel(Payment $payment){
        $payment->status= 2;
        $payment->save();
        return back()->with('swal-success', 'پرداخت مورد نظر با موفقیت باطل شد');
    }
    public function return(Payment $payment){
        $payment->status= 3;
        $payment->save();
        return back()->with('swal-success', 'پرداخت مورد نظر با موفقیت برگشت داده شد');
    }
}
