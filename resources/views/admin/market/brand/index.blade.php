@extends('admin.layouts.master')
@section('head-tag')
    <title>برند ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">برند ها</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>برند ها</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.brand.create') }}" class="btn btn-info btn-sm">ایجاد برند</a>
                <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام اصلی برند</th>
                            <th scope="col">نام فارسی برند</th>
                            <th scope="col">لوگو</th>
                            <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $brand->original_name }}</td>
                                <td>{{ $brand->persian_name }}</td>
                                <td><img src="{{ asset($brand->logo['indexArray'][$brand->logo['currentImage']]) }}"
                                        alt="brand" class="img-fluid" width="50"></td>
                                <td class="width-16rem">
                                    <a href="{{ route('admin.market.brand.edit', [$brand->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline"
                                        action="{{ route('admin.market.brand.destroy', [$brand->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                class="fa fa-trash mx-1"></i>حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('admin.alerts.sweetalert.delete-confirm',['className'=>'delete'])
@endsection
