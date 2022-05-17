@extends('admin.layouts.master')
@section('head-tag')
    <title>گالری محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">گالری محصول</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>گالری محصول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.product.gallery.create', $product->id) }}" class="btn btn-info btn-sm">ایجاد تصویر چدید</a>
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover font-size-8">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>نام محصول</th>
                            <th>تصویر</th>
                            <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->images as $image)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset($image->image['indexArray'][$image->image['currentImage']]) }}"
                                    alt="product image" class="img-fluid" width="150"></td>
                                <td class="width-16rem">
                                    <a href="{{ route('admin.market.product.gallery.edit',[$image->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.market.product.gallery.destroy',[$image->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash mx-1"></i>حذف</button>
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
    @include('admin.alerts.sweetalert.delete-confirm', [
        'className' => 'delete',
    ])
@endsection
