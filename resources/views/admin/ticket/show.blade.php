@extends('admin.layouts.master')
@section('head-tag')
<title>نمایش تیکت ها</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
		<li class="breadcrumb-item active" aria-current="page">نمایش تیکت</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>نمایش نظر</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.tickets.index') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-custom-orange text-white">
				<span class="ml-1">کامران محمدی</span>
				<span class="ml-1">-</span>
				<span class="ml-1">38475</span>
			</div>
			<div class="card-body">
				<div class="card-title">
					<span class="ml-1">مشخصات کالا :</span>
					<span class="ml-1">گوشی نوکیا x-60</span>
					<span class="ml-1">کد کالا :</span>
					<span class="ml-1">2564</span>
				</div>
				<div class="blockquote-footer">
					به نظرم گوشی عالیه هست فقط یه کم داغ می کنه
				</div>
			</div>
		</div>

		<form action="#" method="post">
			<div class="form-group">
				<label for="name">پاسخ تیت</label>
				<textarea rows="4" class="form-control" name="body">متن پاسخ ...</textarea>
			</div>
			<div class="form-group mb-2">
				<button class="btn btn-sm btn-primary" type="submit">ثبت پاسخ</button>
			</div>
		</form>
	</div>
</div>
@endsection