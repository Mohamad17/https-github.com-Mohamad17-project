@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش دسته بندی</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active">دسته بندی</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش دسته بندی</h4>
	<div class="d-flex justify-content-between align-items-center my-3">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
	</div>
	<form class="row" action="#" method="post">
                <div class="col-md-6 mb-2">
                  <fieldset class="form-group">
                     <label for="name">نام دسته بندی</label>
                     <input class="form-control form-control-sm" name="name" type="text" placeholder="نام ...">
                  </fieldset>                  
                </div>
                <div class="col-md-6 mb-2">
                  <fieldset class="form-group">
                     <label for="name">دسته والد</label>
                     <select class="form-control form-control-sm" name="parent_id">
                        <option value="">درصورت وجود والد انتخاب شود</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                     </select>
                  </fieldset>
                </div>
                <div class="col-md-6 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ویرایش</button>
                </div>
            </form>
    </div>
</div>
@endsection
