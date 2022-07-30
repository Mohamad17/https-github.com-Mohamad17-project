@extends('customer.layouts.master')
@section('head-tag')
    <title>{{ $product->name }} / فروشگاه آمازون</title>
@endsection

@section('content')
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>{{ $product->name }}</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <!-- start image gallery -->
                        <section class="col-md-4">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <section class="product-gallery">
                                    <section class="product-gallery-selected-image mb-3">
                                        <img src="{{ asset($product->image['indexArray']['large']) }}"
                                            alt="{{ $product->name }}">
                                    </section>
                                    @php
                                        $images = $product->images()->get();
                                    @endphp
                                    <section class="product-gallery-thumbs">
                                        <img class="product-gallery-thumb"
                                            src="{{ asset($product->image['indexArray']['medium']) }}"
                                            alt="{{ $product->name }}"
                                            data-input="{{ asset($product->image['indexArray']['large']) }}">
                                        @if (count($images) != 0)
                                            @foreach ($images as $key => $image)
                                                <img class="product-gallery-thumb"
                                                    src="{{ asset($image->image['indexArray']['medium']) }}"
                                                    alt="{{ $image->product->name . $key }}"
                                                    data-input="{{ asset($image->image['indexArray']['large']) }}">
                                            @endforeach
                                        @endif
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- end image gallery -->

                        <!-- start product info -->
                        <section class="col-md-5">

                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            {{ $product->name }}
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <form id="add_to_cart"
                                    action="{{ route('customer.sales-process.add-to-cart', $product->id) }}"
                                    method="post">
                                    @csrf
                                    <section class="product-info">
                                        @php
                                            $colors = $product->colors()->get();
                                        @endphp
                                        <p>رنگ : <span id="selected_color">{{ $colors->first()->color_name }}</span></p>
                                        <p>
                                            @foreach ($colors as $key => $color)
                                                <label for="{{ 'color_' . $color->id }}"
                                                    style="background-color: {{ $color->color ?? '#fcfcfc' }};"
                                                    class="product-info-colors me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="{{ $color->color_name }}"></label>
                                                <input type="radio" name="color" value="{{ $color->id }}"
                                                    data-color-name="{{ $color->color_name }}"
                                                    data-price-increase-color="{{ $color->price_increase }}"
                                                    id="{{ 'color_' . $color->id }}" class="d-none"
                                                    @if ($key == 0) checked="true" @endif>
                                            @endforeach
                                        </p>
                                        @php
                                            $guarantees = $product->guarantees()->get();
                                        @endphp
                                        @if (count($guarantees) != 0)
                                            <p class="my-4">
                                                <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> گارانتی
                                                :
                                                <select name="guarantee" id="guarantee">
                                                    @foreach ($guarantees as $key => $guarantee)
                                                        <option
                                                            data-price-increase-guarantee="{{ $guarantee->price_increase }}"
                                                            value="{{ $guarantee->id }}"
                                                            @if ($key == 0) selected="true" @endif>
                                                            {{ $guarantee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                        @endif
                                        <p class="my-4"><i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                            @if ($product->marketable_number > 0)
                                                <span>کالا موجود در انبار</span>
                                            @else
                                                <span> نا موجود </span>
                                            @endif
                                        </p>

                                        @guest
                                            <p class="my-4 px-2">
                                                <button class="addToFavoriteProduct" type="button"
                                                    data-url="{{ route('customer.market.addToFavorite', $product->id) }}">
                                                    <i class="fa fa-heart text-dark"></i> <span>افزودن به علاقه مندی</span>
                                                </button>
                                            </p>
                                        @endguest
                                        @auth
                                            @if ($product->user->contains(auth()->user()->id))
                                                <p class="my-4 px-2">
                                                    <button class="addToFavoriteProduct" type="button"
                                                        data-url="{{ route('customer.market.addToFavorite', $product->id) }}">
                                                        <i class="fa fa-heart text-danger"></i> <span>حذف از علاقه مندی</span>
                                                    </button>
                                                </p>
                                            @else
                                                <p class="my-4 px-2">
                                                    <button class="addToFavoriteProduct" type="button"
                                                        data-url="{{ route('customer.market.addToFavorite', $product->id) }}">
                                                        <i class="fa fa-heart text-dark"></i> <span>افزودن به علاقه مندی</span>
                                                    </button>
                                                </p>
                                            @endif
                                        @endauth
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input class="" id="number" name="number" type="number"
                                                    min="1" step="1" value="1" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                        </section>
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i> {!! $product->introduction !!}
                                        </p>
                                    </section>
                            </section>

                        </section>
                        <!-- end product info -->

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted"><span id="original-price"
                                            data-original-price="{{ $product->price }}">{{ priceformat($product->price) }}</span>
                                        <span class="small">تومان</span>
                                    </p>
                                </section>
                                @php
                                    $amazingSale = $product->activeAmazingSale();
                                @endphp
                                @if (!empty($amazingSale))
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder">
                                            <span id="product-discount-price"
                                                data-product-discount-price="{{ ($product->price * $amazingSale->percentage) / 100 }}">{{ priceFormat(($product->price * $amazingSale->percentage) / 100) }}
                                            </span>

                                            <span class="small">تومان</span>
                                        </p>
                                    </section>
                                @endif

                                <section class="border-bottom mb-3"></section>
                                @if (!empty($amazingSale))
                                    <section class="d-flex justify-content-end align-items-center">
                                        <p class="fw-bolder">
                                            <span id="final-Price">{{ priceFormat($product->price) }} </span>
                                            <span class="small">تومان</span>
                                        </p>
                                    </section>
                                @else
                                    <section class="d-flex justify-content-end align-items-center">
                                        <p class="fw-bolder">
                                            <span id="final-Price">{{ priceFormat($product->price) }} </span>
                                            <span class="small">تومان</span>
                                        </p>
                                    </section>
                                @endif

                                @if ($product->marketable_number != 0)
                                    <section class="">
                                        <button id="next-level" class="btn btn-danger d-block w-100"
                                            onclick="document.getElementById('add_to_cart').submit()">افزودن به سبد
                                            خرید</button>
                                    </section>
                                    </form>
                                @else
                                    <section class="">
                                        <a id="next-level" href="#" class="btn btn-secondary d-block disabled"> در
                                            انبار موجود نمی باشد </a>
                                    </section>
                                @endif


                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->



    <!-- start product lazy load -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach ($relatedProducts as $relatedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                @guest
                                                    <section class="product-add-to-favorite"><button data-bs-toggle="tooltip"
                                                            class="addToFavorite" type="button"
                                                            data-url="{{ route('customer.market.addToFavorite', $relatedProduct->id) }}"
                                                            data-bs-placement="left" title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart text-dark"></i></button></section>
                                                @endguest
                                                @auth
                                                    @if ($relatedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite" type="button"
                                                                data-url="{{ route('customer.market.addToFavorite', $relatedProduct->id) }}"
                                                                data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i></button></section>
                                                    @else
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite" type="button"
                                                                data-url="{{ route('customer.market.addToFavorite', $relatedProduct->id) }}"
                                                                data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i></button></section>
                                                    @endif
                                                @endauth
                                                <a class="product-link"
                                                    href="{{ route('customer.market.product', $relatedProduct->slug) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                            src="{{ asset($relatedProduct->image['indexArray']['medium']) }}"
                                                            alt="{{ $relatedProduct->name }}">
                                                    </section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($relatedProduct->name, 20) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-price">
                                                            {{ priceFormat($relatedProduct->price) }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($relatedProduct->colors as $color)
                                                            <section class="product-colors-item"
                                                                style="background-color: {{ $color->color }};">
                                                            </section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->

    <!-- start description, features and comments -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section id="introduction-features-comments" class="introduction-features-comments">
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span class="me-2"><a class="text-decoration-none text-dark"
                                                href="#introduction">معرفی</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark"
                                                href="#features">ویژگی ها</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark"
                                                href="#comments">دیدگاه ها</a></span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- start content header -->

                        <section class="py-4">

                            <!-- start vontent header -->
                            <section id="introduction" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        معرفی
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-introduction mb-4">
                                {!! $product->introduction !!}
                            </section>

                            <!-- start vontent header -->
                            <section id="features" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        ویژگی ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            @php
                                $values = $product->values;
                                $metas = $product->metas;
                            @endphp
                            <section class="product-features mb-4 table-responsive">
                                <table class="table table-bordered border-white">
                                    @foreach ($values as $value)
                                        <tr>
                                            <td>{{ $value->attribute->name }}</td>
                                            <td>{{ json_decode($value->value)->value . ' ' . $value->attribute->unit }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($metas as $meta)
                                        <tr>
                                            <td>{{ $meta->meta_key }}</td>
                                            <td>{{ $meta->meta_value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </section>

                            <!-- start vontent header -->
                            <section id="comments" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        دیدگاه ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-comments mb-4">
                                @auth
                                    <section class="comment-add-wrapper">
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1"
                                            aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i
                                                                class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row"
                                                            action="{{ route('customer.market.addComment', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <section class="col-12 mb-2">
                                                                <label for="body" class="form-label mb-1">دیدگاه
                                                                    شما</label>
                                                                <textarea class="form-control form-control-sm" name="body" id="body" placeholder="دیدگاه شما ..."
                                                                    rows="4">{{ old('body') }}</textarea>
                                                            </section>
                                                            @error('body')
                                                                <small class="text-danger my-2">{{ $message }}</small>
                                                            @enderror
                                                            <section class="modal-footer py-1">
                                                                <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                                    دیدگاه</button>
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    data-bs-dismiss="modal">بستن</button>
                                                            </section>
                                                        </form>
                                                    </section>

                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                @endauth
                                @guest
                                    <section class="comment-add-wrapper">
                                        <div class="comment-add-button">
                                            کاربر گرامی برای ثبت نظر <a class="text-info"
                                                href="{{ route('customer.auth.login-register-form') }}">وارد شوید</a>
                                        </div>
                                    </section>
                                @endguest

                                @foreach ($comments as $comment)
                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">
                                                {{ date_to_persian($comment->created_at) }}</section>
                                            <section class="product-comment-title">
                                                @if (!empty($comment->user->first_name) && !empty($comment->user->last_name))
                                                    {{ $comment->user->full_name }}
                                                @else
                                                    ناشناس
                                                @endif
                                            </section>
                                        </section>
                                        <section class="product-comment-body">
                                            {{ $comment->body }}
                                        </section>
                                        @php
                                            $answers = $comment->answers;
                                        @endphp
                                        @if (count($answers) != 0)
                                            @foreach ($answers as $answer)
                                                <section class="product-comment ms-5 border-bottom-0">
                                                    <section class="product-comment-header d-flex justify-content-start">
                                                        <section class="product-comment-date">
                                                            {{ date_to_persian($answer->created_at) }}</section>
                                                        <section class="product-comment-title">
                                                            @if (!empty($answer->user->first_name) && !empty($answer->user->last_name))
                                                                {{ $answer->user->full_name }}
                                                            @else
                                                                ناشناس
                                                            @endif
                                                        </section>
                                                    </section>
                                                    <section class="product-comment-body">
                                                        {{ $answer->body }}
                                                    </section>
                                                </section>
                                            @endforeach
                                        @endif
                                    </section>
                                @endforeach
                            </section>
                        </section>

                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end description, features and comments -->

    <!-- toast alert start-->
    <div class="position-fixed p-3" style="z-index: 909999999; left: 0; top: 3rem; width: 26rem; max-width: 80%;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="4000">
            <div class="toast-header d-flex justify-content-around">
                <strong class="mr-auto">برای ثبت علاقه مندی ها باید وارد شوید</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <span>صفحه </span><a class="text-info" href="{{ route('customer.auth.login-register-form') }}"> ورود /
                    ثبت نام</a>
            </div>
        </div>
    </div>
    <!-- toast alert end-->
@endsection
@section('script')
    <script>
        //start product introduction, features and comment
        $(document).ready(function() {
            var s = $("#introduction-features-comments");
            var pos = s.position();
            $(window).scroll(function() {
                var windowpos = $(window).scrollTop();

                if (windowpos >= pos.top) {
                    s.addClass("stick");
                } else {
                    s.removeClass("stick");
                }
            });
        });
        //end product introduction, features and comment
    </script>
    <script>
        $(document).ready(function() {
            bill();

            //color input
            $('input[name="color"]').on('change', function() {
                bill();
            })

            //guarantee input
            $('#guarantee').on('change', function() {
                // alert($('#guarantee').val())
                bill();
            })

            //number input
            $('.cart-number').on('click', function() {
                bill();
            })



            function bill() {
                // color
                var selectedColor = $('input[name="color"]:checked');





                var selectedColorPrice = 0;
                var selectedGuaranteePrice = 0;
                var number = 1;
                var producrDiscountPrice = 0;
                var productOriginalPrice = parseFloat($('#original-price').attr('data-original-price'));

                // color
                if (selectedColor.length != 0) {
                    $('#selected_color').html(selectedColor.attr('data-color-name'));
                    selectedColorPrice = parseFloat(selectedColor.attr('data-price-increase-color'));
                }

                // guarantee
                if ($('#guarantee').length != 0) {
                    var selectedGuarantee = $('#guarantee option:selected');
                    selectedGuaranteePrice = parseFloat(selectedGuarantee.attr('data-price-increase-guarantee'));
                }

                // number
                if ($('#number').val() > 0) {
                    number = $('#number').val();
                }

                // discount
                if ($('#product-discount-price').length != 0) {
                    var discountPrice = $('#product-discount-price').attr('data-product-discount-price');
                    producrDiscountPrice = parseFloat(discountPrice);
                }

                var productPrice = productOriginalPrice + selectedGuaranteePrice + selectedColorPrice;
                // final price
                var finalPrice = number * (productPrice - producrDiscountPrice);

                $('#original-price').html(pricePersianFormat(productPrice));
                $('#final-Price').html(pricePersianFormat(finalPrice));
            }

            function pricePersianFormat(price) {
                const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

                price = Intl.NumberFormat().format(price);

                return price.toString().replace(/\d/g, x => persianDigits[x]);

            }

            $('.addToFavoriteProduct').click(function() {
                var url = $(this).attr('data-url');
                var element = $(this);
                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(result) {
                        if (result.status == 1) {
                            element.children().first().removeClass('text-dark');
                            element.children().first().addClass('text-danger');
                            element.children().last().html('حذف از علاقه مندی ها');
                        } else if (result.status == 2) {
                            element.children().first().removeClass('text-danger');
                            element.children().first().addClass('text-dark');
                            element.children().last().html('افزودن به علاقه مندی ها');
                        } else if (result.status == 3) {
                            $('.toast').toast('show');
                        }
                    }
                });
            })
            $('.addToFavorite').click(function() {
                var url = $(this).attr('data-url');
                var element = $(this);
                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(result) {
                        if (result.status == 1) {
                            element.children().first().removeClass('text-dark');
                            element.children().first().addClass('text-danger');
                            $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                            $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                        } else if (result.status == 2) {
                            element.children().first().removeClass('text-danger');
                            element.children().first().addClass('text-dark');
                            $(element).attr('data-original-title', 'افزودن به علاقه مندی ها');
                            $(element).attr('data-bs-original-title',
                                'افزودن به علاقه مندی ها');
                        } else if (result.status == 3) {
                            $('.toast').toast('show');
                        }
                    }
                });
            })
        });
    </script>
@endsection
