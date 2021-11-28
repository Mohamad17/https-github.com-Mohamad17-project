@extends('admin.layouts.master')
@section('head-tag')
<title>پرداخت ها</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active" aria-current="page">پرداخت ها</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>پرداخت ها</h4>
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
					<tr>
						<th scope="row">1</th>
						<td>95065485</td>
						<td>ملی</td>
						<td>محمد رحمتی</td>
						<td>پرداخت شده</td>
						<td>آنلاین</td>						
						<td class="width-12rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownMenuPay" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPay">
                                <a href="#" class="dropdown-item"><span><i class="far fa-eye mx-1"></i></span>مشاهده </a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-window-close mx-1"></i></span>باطل کردن</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-reply-all mx-1"></i></span>برگرداندن</a>
                            </div>
                        </div>							
						</td>
					</tr>                    
                    <tr>
						<th scope="row">1</th>
						<td>95065485</td>
						<td>پاسارگاد</td>
						<td>محمد رحمتی</td>
						<td>پرداخت شده</td>
						<td>آفلاین</td>						
						<td class="width-12rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownMenuPay" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPay">
                                <a href="#" class="dropdown-item"><span><i class="far fa-eye mx-1"></i></span>مشاهده </a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-window-close mx-1"></i></span>باطل کردن</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-reply-all mx-1"></i></span>برگرداندن</a>
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