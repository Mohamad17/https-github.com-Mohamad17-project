@extends('admin.layouts.master')
@section('head-tag')
<title>سفارشات</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active" aria-current="page">سفارشات</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>سفارشات</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="" class="btn btn-info btn-sm disabled">ایجاد سفارش جدید</a>
			<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover font-size-8">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th>کد سفارش</th>
						<th>مبلغ سفارش</th>
						<th>مبلغ تخفیف</th>
						<th>مبلغ نهایی</th>
						<th>وضعیت پرداخت</th>
						<th>شیوه پرداخت</th>
						<th>بانک</th>
						<th>وضعیت ارسال</th>
						<th>شیوه ارسال</th>
						<th>وضعیت سفارش</th>
						<th scope="col" class="max-width-9rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>95065485</td>
						<td>290000 تومان</td>
						<td>35000 تومان</td>
						<td>255000 تومان</td>
						<td><span><i class="fa fa-credit-card mx-1"></i></span><span> پرداخت شده</span></td>
						<td>آنلاین</td>						
						<td>ملت</td>						
						<td><span><i class="fas fa-clock mx-1"></i></span><span> در حال ارسال</span></td>						
						<td>پست</td>						
						<td>در حال ارسال</td>						
						<td class="width-9rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownLinkMenu" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownLinkMenu">
                                <a href="#" class="dropdown-item"><span><i class="far fa-eye mx-1"></i></span>مشاهده فاکتور</a>
                                <a href="#" class="dropdown-item"><span><i class="fa fa-tasks mx-1"></i></span>تغییر وضعیت سفارش</a>
                                <a href="#" class="dropdown-item"><span><i class="fa fa-truck mx-1"></i></span>تغییر وضعیت ارسال</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-window-close mx-1"></i></span>باطل کردن سفارش</a>
                            </div>
                        </div>							
						</td>
					</tr>                    
                </tbody>
			</table>
		</div>
	</div>
</div>

@endsection