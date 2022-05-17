@extends('admin.layouts.master')
@section('head-tag')
    <title>فرم های محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item">فرم محصول</li>
            <li class="breadcrumb-item active" aria-current="page">مقدار فرم محصول</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>مقدار فرم محصول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.property.value.create', $property->id) }}" class="btn btn-info btn-sm">ایجاد مقدار فرم محصول</a>
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام فرم</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">مقدار</th>
                            <th scope="col">میزان افزایش قیمت</th>
                            <th scope="col">نوع</th>
                            <th scope="col" class="max-width-22rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($property->values as $value)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $property->name }}</td>
                                <td>{{ $value->product->name }}</td>
                                <td>{{ json_decode($value->value)->value }}</td>
                                <td>{{ json_decode($value->value)->price_increase }}</td>
                                <td>{{ $value->type }}</td>
                                <td class="width-22rem">
                                    <a href="{{ route('admin.market.property.value.edit', ['property'=>$property->id, 'value'=>$value->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline"
                                        action="{{ route('admin.market.property.value.destroy', $value->id) }}"
                                        method="POST">
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
    @include('admin.alerts.sweetalert.delete-confirm', [
        'className' => 'delete',
    ])
@endsection
