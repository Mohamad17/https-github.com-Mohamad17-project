@extends('admin.layouts.master')
@section('head-tag')
    <title>فرم های محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">فرم محصول</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>فرم محصول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.property.create') }}" class="btn btn-info btn-sm">ایجاد فرم محصول</a>
                <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام فرم</th>
                            <th scope="col">واحد اندازه گیری</th>
                            <th scope="col">دسته بندی</th>
                            <th scope="col" class="max-width-22rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->unit }}</td>
                                <td>{{ $attribute->category->name }}</td>
                                <td class="width-22rem">
                                    <a href="{{ route('admin.market.property.value.index', $attribute->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-grip-vertical mx-1"></i>ویژگی ها</a>
                                    <a href="{{ route('admin.market.property.edit', $attribute->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline"
                                        action="{{ route('admin.market.property.destroy', [$attribute->id]) }}"
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
