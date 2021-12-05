@extends('admin.layouts.master')
@section('head-tag')
<title>دسته بندی ها</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active" aria-current="page">دسته بندی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>دسته بندی</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
            <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام دسته</th>
                        <th scope="col">عکس</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">اسلاگ</th>
                        <th scope="col">تگ ها</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postCategories as $key=>$postCategory)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $postCategory->name }}</td>
                        <td><img src="{{ $postCategory->image }}" alt="category image" class="img-fluid" width="50" height="50"></td>
                        <td>{{ $postCategory->description }}</td>
                        <td>{{ $postCategory->slug }}</td>
                        <td>{{ $postCategory->tags }}</td>
                        <td>
                            <label><input id="{{ $postCategory->id }}" data-url="{{ route('admin.content.category.status',[$postCategory->id]) }}" onchange="changeStatus({{ $postCategory->id }})" type="checkbox" @if($postCategory->status==1) checked @endif></label>
                        </td>
                        <td class="width-16rem">
                            <a href="{{ route('admin.content.category.edit',[$postCategory->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            <form class="d-inline" action="{{ route('admin.content.category.destroy' ,[$postCategory->id]) }}" method="POST">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
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
<script type="text/javascript">
function changeStatus(id){
    var element=$('#'+id);
    var url= element.attr('data-url');
    var exStatus= !element.prop('checked');

    $.ajax({
        url: url,
        type: 'GET',
        success: function(response){
            if(response.status){
                if(response.checked){
                    element.prop('checked',true);
                }else{
                    element.prop('checked',false);
                }
            }else{
                element.prop('checked',exStatus);
            }
        }
    });
}
</script>
@endsection