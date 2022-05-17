@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد محصول جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">محصولات</li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد محصول جدید </li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ایجاد محصول جدید </h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.market.product.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="name">نام محصول</label>
                        <input class="form-control form-control-sm" name="name" value="{{ old('name') }}" type="text"
                            placeholder="نام ...">
                    </fieldset>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="category_id">دسته بندی</label>
                        <select class="form-control form-control-sm" name="category_id" id="category_id">
                            <option value="">دسته بندی محصول را انتخاب شود</option>
                            @foreach ($productCategories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="brand_id">برند</label>
                        <select class="form-control form-control-sm" name="brand_id" id="brand_id">
                            <option value="">برند محصول را انتخاب شود</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if (old('brand_id') == $brand->id) selected @endif>
                                    {{ $brand->original_name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @error('brand_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="image">تصویر</label>
                        <input class="form-control form-control-sm" name="image" type="file">
                    </fieldset>
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="price">قیمت</label>
                        <input class="form-control form-control-sm" name="price" value="{{ old('price') }}" type="text"
                            placeholder="قیمت ...">
                    </fieldset>
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="weight">وزن</label>
                        <input class="form-control form-control-sm" name="weight" value="{{ old('weight') }}" type="text"
                            placeholder="وزن ...">
                    </fieldset>
                    @error('weight')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="length">طول</label>
                        <input class="form-control form-control-sm" name="length" value="{{ old('length') }}" type="text"
                            placeholder="طول ...">
                    </fieldset>
                    @error('length')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="width">عرض</label>
                        <input class="form-control form-control-sm" name="width" value="{{ old('width') }}" type="text"
                            placeholder="عرض ...">
                    </fieldset>
                    @error('width')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="height">ارتفاع</label>
                        <input class="form-control form-control-sm" name="height" value="{{ old('height') }}" type="text"
                            placeholder="ارتفاع ...">
                    </fieldset>
                    @error('height')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="published_at">تاریخ انتشار</label>
                        <input class="form-control form-control-sm d-none" name="published_at" id="published_at" type="text"
                            placeholder="تاریخ انتشار ...">
                        <input class="form-control form-control-sm" id="published_at_view" type="text"
                            placeholder="تاریخ انتشار ...">
                    </fieldset>
                    @error('published_at')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="tags">تگ ها</label>
                        <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                            value="{{ old('tags') }}">
                        <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                        </select>
                    </div>
                    @error('tags')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="status">وضعیت</label>
                        <select class="form-control form-control-sm" name="status" id="status">
                            <option value="0" @if (old('status') == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
                        </select>
                    </fieldset>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="marketable">قابل فروش بودن</label>
                        <select class="form-control form-control-sm" name="marketable" id="marketable">
                            <option value="0" @if (old('marketable') == 0) selected @endif>غیر قابل فروش</option>
                            <option value="1" @if (old('marketable') == 1) selected @endif>قابل فروش</option>
                        </select>
                    </fieldset>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <fieldset class="form-group">
                        <label for="body">معرفی محصول</label>
                        <textarea class="form-control form-control-sm" id="introduction" name="introduction" cols="6"
                            placeholder="معرفی محصول  ...">{{ old('introduction') }}</textarea>
                    </fieldset>
                    @error('introduction')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <section class="col-12 border-top border-bottom py-3 mb-3">
                    <div class="form-row">
                        <div class="col-5 col-md-4">
                            <fieldset class="form-group">
                                <input id="meta_key" class="form-control form-control-sm" name="meta_key[]" type="text"
                                    placeholder="ویژگی محصول ...">
                            </fieldset>
                        </div>
                        <div class="col-5 col-md-4">
                            <fieldset class="form-group">
                                <input id="meta_value" class="form-control form-control-sm" name="meta_value[]" type="text"
                                    placeholder="مقدار ...">
                            </fieldset>
                        </div>
                        <div class="col-2">
                            <span class="text-danger d-none" id="remove-row" data-toggle="tooltip" data-placement="right"
                                title="حذف ویژگی"><i class="far fa-minus-square fa-2x"></i></span>
                        </div>
                    </div>
                    <div>
                        <button id="btn-copy" class="btn btn-sm btn-success" type="button">افزودن</button>
                    </div>
                </section>
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
    <script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}">
    </script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
    <script>
        $(document).ready(function() {
            $("#published_at_view").persianDatepicker({
                viewMode: 'YYYY-MM-DD',
                altField: '#published_at'
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            var tags = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags.val();
            var default_data = null;

            if (tags.val() !== null && tags.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفاً تگ های خود را وارد کنید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');

            $('form').submit(getTags);

            function getTags(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags.val(selectedSource)
                }
            }


            $('#btn-copy').on('click', function() {
                if ($('#meta_key').val() !== null && $('#meta_key').val().length > 0 &&
                    $('#meta_value').val() !== null && $('#meta_value').val().length > 0) {
                    var ele = $(this).parent().prev().clone(true);
                    ele.children('.col-2').children('#remove-row').removeClass('d-none');
                    $(this).before(ele);
                } else alert('ویژگی نباید خالی باشد');
            });
            $('#remove-row').click(function() {
                console.log('hi')
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection
