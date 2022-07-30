@extends('customer.layouts.master')
@section('head-tag')
    <title>فروشگاه آمازون</title>
@endsection

@section('content')
    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    @foreach ($sliders as $slider)
                        <section class="item"><a class="w-100 d-block h-auto text-decoration-none"
                                href="{{ urldecode($slider->url) }}"><img class="w-100 rounded-2 d-block h-auto"
                                    src="{{ $slider->image }}" alt="{{ $slider->title }}"></a>
                        </section>
                    @endforeach
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                @foreach ($sideSliders as $slider)
                    <section class="mb-2"><a href="{{ urldecode($slider->url) }}" class="d-block"><img
                                class="w-100 rounded-2" src="{{ $slider->image }}" alt="{{ $slider->title }}"></a>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach ($mostVisitedProducts as $product)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                @guest
                                                    <section class="product-add-to-favorite"><button data-bs-toggle="tooltip"
                                                            class="addToFavorite"
                                                            data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                            data-bs-placement="left" title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart text-dark"></i></button></section>
                                                @endguest
                                                @auth
                                                    @if ($product->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite"
                                                                data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                                data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i></button></section>
                                                    @else
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite"
                                                                data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                                data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i></button></section>
                                                    @endif
                                                @endauth
                                                <a class="product-link"
                                                    href="{{ route('customer.market.product', $product->slug) }}">
                                                    <section class="product-image">
                                                        <img width="200" height="200"
                                                            src="{{ asset($product->image['indexArray']['medium']) }}"
                                                            alt="{{ $product->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($product->name, 20) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section>
                                                        <section class="product-price">{{ priceFormat($product->price) }}
                                                            تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($product->colors as $color)
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



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach ($betweenSliders as $betweenBanner)
                    <a class="col-12 col-md-6 mt-2 mt-md-0" href="{{ urldecode($betweenBanner->url) }}">
                        <img class="d-block rounded-2 w-100" src="{{ asset($betweenBanner->image) }}"
                            alt="{{ $betweenBanner->title }}">
                    </a>
                @endforeach
            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach ($offerProducts as $product)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                @guest
                                                    <section class="product-add-to-favorite"><button data-bs-toggle="tooltip"
                                                            class="addToFavorite"
                                                            data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                            data-bs-placement="left" title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart text-dark"></i></button></section>
                                                @endguest
                                                @auth
                                                    @if ($product->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite"
                                                                data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                                data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i></button></section>
                                                    @else
                                                        <section class="product-add-to-favorite"><button
                                                                data-bs-toggle="tooltip" class="addToFavorite"
                                                                data-url="{{ route('customer.market.addToFavorite', $product->id) }}"
                                                                data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i></button></section>
                                                    @endif
                                                @endauth
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="img-fluid"
                                                            src="{{ asset($product->image['indexArray']['medium']) }}"
                                                            alt="{{ $product->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($product->name, 20) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section>
                                                        <section class="product-price">
                                                            {{ priceFormat($product->price) }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($product->colors as $color)
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


    <!-- start ads section -->

    @if (!empty($bottomSlider))
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <a href="{{ urldecode($bottomSlider->url) }}"></a>
                        <img class="d-block rounded-2 w-100" src="{{ asset($bottomSlider->image) }}"
                            alt="{{ $bottomSlider->title }}">
                    </section>
                </section>

            </section>
        </section>
    @endif
    <!-- end ads section -->



    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach ($brands as $brand)
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#"><img class="rounded-2 img-fluid"
                                                src="{{ asset($brand->logo['indexArray']['medium']) }}"
                                                alt="{{ $brand->persian_name }}"></a>
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->


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
        $(document).ready(function() {
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
