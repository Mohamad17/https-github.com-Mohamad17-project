@extends('admin.layouts.master')
@section('head-tag')
<title>محصولات</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active" aria-current="page">محصولات</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>محصولات</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm">ایجاد محصول چدید</a>
			<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover font-size-8">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th>نام محصول</th>
						<th>تصویر</th>
						<th>قیمت</th>
						<th>وزن</th>
						<th>دسته بندی</th>
						<th>فرم</th>
						<th scope="col" class="max-width-12rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>آیفون 12</td>
						<td><img src="asset/images/avatar-2.jpg" alt="product"></td>
						<td>120/000/000 ﷼</td>
						<td>.5 کیلو</td>
						<td>محصول الکترونیک</td>
						<td>صفحه نمایش</td>						
						<td class="width-12rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownMenuPay" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPay">
                                <a href="#" class="dropdown-item"><span><i class="far fa-images mx-1"></i></span> گالری</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-list-ul mx-1"></i></span> فرم کالا</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-edit mx-1"></i></span> ویرایش</a>
								<form action="#" method="POST">
									<button type="submit" class="dropdown-item btn btn-sm btn-danger"><i class="far fa-trash-alt mx-1"></i></span> حذف</button>
								</form>
                            </div>
                        </div>							
						</td>
					</tr>                    
					<tr>
						<th scope="row">1</th>
						<td>آیفون 13</td>
						<td><img src="asset/images/avatar-2.jpg" alt="product"></td>
						<td>180/000/000 ﷼</td>
						<td>.5 کیلو</td>
						<td>محصول الکترونیک</td>
						<td>صفحه نمایش</td>						
						<td class="width-12rem">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-success btn-block btn-sm dropdown-toggle" id="dropdownMenuPay" data-toggle="dropdown" aria-expended="false" type="button">
                            <i class="fas fa-tools mx-1"></i>عملیات</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuPay">
                                <a href="#" class="dropdown-item"><span><i class="far fa-images mx-1"></i></span> گالری</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-list-ul mx-1"></i></span> فرم کالا</a>
                                <a href="#" class="dropdown-item"><span><i class="fas fa-edit mx-1"></i></span> ویرایش</a>
								<form action="#" method="POST">
									<button type="submit" class="dropdown-item btn btn-sm btn-danger"><i class="far fa-trash-alt mx-1"></i></span> حذف</button>
								</form>
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