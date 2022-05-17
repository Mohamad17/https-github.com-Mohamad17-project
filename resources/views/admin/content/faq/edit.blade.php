@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active">سوالات متداول</li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش سوال</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ویرایش سوالات متداول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.content.faq.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.content.faq.update', [$faq->id]) }}" method="post">
                @csrf
                {{ method_field('put') }}
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="question">پرسش</label>
                        <input class="form-control form-control-sm" value="{{ old('question', $faq->question) }}"
                            name="question" type="text" placeholder="پرسش ...">
                    </fieldset>
                    @error('question')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="status">وضعیت</label>
                        <select class="form-control form-control-sm" name="status" id="status">
                            <option value="0" @if (old('status', $faq->status) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if (old('status', $faq->status) == 1) selected @endif>فعال</option>
                        </select>
                    </fieldset>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="tags">تگ ها</label>
                        <input type="hidden" class="form-control form-control-sm" value="{{ old('tags', $faq->tags) }}"
                            name="tags" id="tags">
                        <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                        </select>
                    </div>
                    @error('tags')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <fieldset class="form-group">
                        <label for="answer">پاسخ</label>
                        <textarea class="form-control form-control-sm" id="answer" name="answer"
                            cols="6">{{ old('answer', $faq->answer) }}</textarea>
                    </fieldset>
                    @error('answer')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('answer');
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
        });
    </script>
@endsection
