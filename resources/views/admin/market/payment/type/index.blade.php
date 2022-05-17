@extends('admin.layouts.master')
@section('head-tag')
<title>پرداخت ها</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">پرداخت ها</li>
		<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4><span>پرداخت ها</span><span> - {{ $title }}</span></h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="" class="btn btn-info btn-sm disabled">ایجاد پرداخت چدید</a>
			<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover font-size-8">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th>کد تراکنش</th>
						<th>بانک</th>
						<th>پرداخت کننده</th>
						<th>وضعیت پرداخت</th>
						<th>شیوه پرداخت</th>
						<th scope="col" class="max-width-12rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($payments as $payment)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $payment->paymentable->transaction_id?? "-"}}</td>
						<td>{{ $payment->paymentable->gateway??"-"}}</td>
						<td>{{ $payment->user->full_name }}</td>
						<td class="{{ paymentsStatusStyle($payment->status) }}">{{ paymentsStatus($payment->status) }}</td>
						<td>{{ paymentsType($payment->type) }}</td>						
						<td class="width-12rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownMenuPay" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPay">
								<a href="{{ route('admin.market.payment.show', $payment->id) }}" class="dropdown-item"><span><i class="far fa-eye mx-1"></i></span>مشاهده </a>
                                <a href="{{ route('admin.market.payment.cancel', $payment->id) }}" class="dropdown-item"><span><i class="fas fa-window-close mx-1"></i></span>باطل کردن</a>
                                <a href="{{ route('admin.market.payment.return', $payment->id) }}" class="dropdown-item"><span><i class="fas fa-reply-all mx-1"></i></span>برگرداندن</a>
                            </div>
                        </div>							
						</td>
					</tr>                    
					@endforeach
                </tbody>
			</table>
		</div>
	</div>
</div>

@endsection