@extends('admin.layouts.master')
@section('head-tag')
    <title>نمایش نظر</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروشگاه</a></li>
            <li class="breadcrumb-item active">پرداخت</li>
            <li class="breadcrumb-item active" aria-current="page">نمایش پرداخت</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>نمایش پرداخت</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.payment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-custom-orange text-white">
                    <span class="ml-1">پرداخت کننده</span>
                    <span class="ml-1">{{ $payment->user->fullName }}</span>
                </div>
                <div class="card-body">
                    <div class="card-title flex flex-col">
                        <div class="mb-3">
                            <span class="ml-1">مبلغ :</span>
                            <span class="ml-1">{{ $payment->amount }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="ml-1">نوع پرداخت :</span>
                            <span class="ml-1">{{ paymentsType($payment->type) }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="ml-1">وضعیت پرداخت :</span>
                            <span
                                class="ml-1 {{ paymentsStatusStyle($payment->status) }}">{{ paymentsStatus($payment->status) }}</span>
                        </div>
						<div class="mb-3">
                            <span class="ml-1">کد تراکنش :</span>
                            <span class="ml-1">{{ $payment->paymentable->transaction_id?? "-" }}</span>
                        </div>
						<div class="mb-3">
                            <span class="ml-1">بانک :</span>
                            <span class="ml-1">{{ $payment->paymentable->gateway??"-" }}</span>
                        </div>
						<div class="mb-3">
                            <span class="ml-1">دریافت کننده :</span>
                            <span class="ml-1">{{ $payment->paymentable->cash_receiver?? "-" }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </iv>
    @endsection
