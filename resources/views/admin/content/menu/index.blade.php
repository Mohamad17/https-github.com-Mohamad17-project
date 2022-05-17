@extends('admin.layouts.master')
@section('head-tag')
    <title>منو</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active" aria-current="page">منو</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>منو</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.content.menu.create') }}" class="btn btn-info btn-sm">ایجاد منو</a>
                <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام منو</th>
                            <th scope="col">منوی والد</th>
                            <th scope="col">لینک منو</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->parent_id? $menu->parent->name: "منوی اصلی" }}</td>
                                <td>{{ $menu->url }}</td>
                                <td>
                                    <label><input id="{{ $menu->id }}"
                                            data-url="{{ route('admin.content.menu.status', [$menu->id]) }}"
                                            onchange="changeStatus({{ $menu->id }})" type="checkbox"
                                            @if ($menu->status == 1) checked @endif></label>
                                </td>
                                <td class="width-12rem">
                                    <a href="{{ route('admin.content.menu.edit', [$menu->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline"
                                        action="{{ route('admin.content.menu.destroy', [$menu->id]) }}" method="POST">
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
    <script>
        function changeStatus(id) {
            var element = $('#' + id);
            var url = element.attr('data-url');
            var exStatus = !element.prop('checked');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successAlert('وضعیت با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successAlert('وضعیت با موفقیت غیر فعال شد');
                        }
                    } else {
                        element.prop('checked', exStatus);
                        errorAlert('تغییر وضعیت انجام نشد');
                    }
                },
                error: function() {
                    element.prop('checked', exStatus);
                    errorAlert('تغییر وضعیت انجام نشد');
                }
            });

            function successAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }

            function errorAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>
    @include('admin.alerts.sweetalert.delete-confirm',['className'=>'delete'])
@endsection

