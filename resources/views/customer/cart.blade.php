@extends('customer.layouts.master')
@section('head-tag')
    <title>سبد کالا / فروشگاه آمازون</title>
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
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    @php
                        $totalProductPrice = 0;
                        $totalDiscount = 0;
                    @endphp
                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <form id="cart_items" class="content-wrapper bg-white p-3 rounded-2" action=""
                                method="post">
                                @foreach ($cartItems as $cartItem)
                                    @php
                                        $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                        $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                        $finalPrice = $cartItem->cartItemFinalPrice();
                                    @endphp
                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1"><img
                                                src="{{ asset($cartItem->product->image['indexArray']['small']) }}"
                                                alt="{{ $cartItem->product->name }}"></section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{ $cartItem->product->name }}</p>
                                            <p><span>قیمت بدون تخفیف : </span> <span
                                                    class="fw-bold">{{ priceFormat($cartItem->product->price) }}
                                                    تومان</span></p>
                                            @if (!empty($cartItem->color))
                                                <p><span style="background-color: {{ $cartItem->color->color }};"
                                                        class="cart-product-selected-color me-1"></span>
                                                    <span>{{ $cartItem->color->color_name }}</span>
                                                </p>
                                            @else
                                                <p>برای این محصول رنگی وجود ندارد</p>
                                            @endif
                                            @if (!empty($cartItem->guarantee))
                                                <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span>
                                                        {{ $cartItem->guarantee->name }}</span>
                                                </p>
                                            @else
                                                <p>برای این محصول گارانتی وجود ندارد</p>
                                            @endif
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا
                                                    موجود
                                                    در انبار</span></p>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input class="number" type="number" min="1"
                                                    data-cart-id="{{ $cartItem->id }}"
                                                    data-product-price="{{ $cartItem->cartItemProductPrice() }}"
                                                    step="1" value="{{ $cartItem->number }}" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                            <button type="button" class="removeItem"
                                                class="text-decoration-none ms-4 cart-delete"
                                                data-url="{{ route('customer.sales-process.remove-from-cart', $cartItem->id) }}"><i
                                                    class="fa fa-trash-alt"></i> حذف از سبد</button>
                                        </section>

                                        <section class="align-self-end flex-shrink-1">
                                            @if (!empty($cartItem->product->activeAmazingSale()))
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف
                                                    <span class="discountPrice" id="discountPrice{{ $cartItem->id }}"
                                                        data-product-discount="{{ $cartItem->cartItemProductDiscount() }}"
                                                        data-percentage-discount="{{ $cartItem->product->activeAmazingSale()->percentage }}">
                                                        {{ priceFormat($cartItem->cartItemProductDiscount() * $cartItem->number) }}
                                                    </span>
                                                    <span> تومان </span>
                                                    <span>
                                                        ({{ englishToPersian($cartItem->product->activeAmazingSale()->percentage) }}
                                                        ٪)</span>
                                                </section>
                                            @endif
                                            <section class="text-nowrap fw-bold">
                                                <span id="productPrice{{ $cartItem->id }}"
                                                    data-total-price="{{ $cartItem->cartItemFinalPrice() }}">{{ priceFormat($cartItem->cartItemFinalPrice()) }}</span>
                                                تومان
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ count($cartItems) }})</p>
                                    <p class="text-muted"><span
                                            id="finalProductsPrice">{{ priceFormat($totalProductPrice) }}</span> تومان
                                    </p>
                                </section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder"><span
                                            id="finalDiscounts">{{ priceFormat($totalDiscount) }}</span> تومان</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span
                                            id="finalCartPrice">{{ priceFormat($totalProductPrice - $totalDiscount) }}</span>
                                        تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت
                                    سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید.
                                    نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این
                                    سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="address.html" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->


    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
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
    <!-- toast add favoritie alert start-->
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


    <!-- toast remove cart item alert start-->
    <div class="position-fixed p-3" style="z-index: 909999999; left: 0; top: 3rem; width: 26rem; max-width: 80%;">
        <div id="liveToast" class="toast removeItemToast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="4000">
            <div class="toast-header d-flex justify-content-around">
                <strong class="mr-auto">این محصول در سبد خرید شما وجود ندارد</strong>
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
            // bill();

            //number input
            $('.cart-number').on('click', function() {
                bill($(this));
            })

            function finalPrice(){
                var itemsTotalPrice = 0;
                $('.number').each(function() {
                    var itemPrice = parseFloat($(this).attr('data-product-price'));
                    var itemTotalPrice = parseFloat(itemPrice * $(this).val());
                    itemsTotalPrice += itemTotalPrice;
                });
                var itemsTotalDiscount = 0;
                $('.discountPrice').each(function() {
                    var itemDiscount = parseFloat($(this).attr('data-product-discount'));
                    var itemTotalDiscount = parseFloat(itemDiscount * $(this).parent().parent().siblings(
                            '.align-self-start').children('.cart-product-number').children('.number')
                        .val());
                    itemsTotalDiscount += itemTotalDiscount;
                });

                $('#finalProductsPrice').html(pricePersianFormat(itemsTotalPrice));
                $('#finalDiscounts').html(pricePersianFormat(itemsTotalDiscount));
                $('#finalCartPrice').html(pricePersianFormat(itemsTotalPrice - itemsTotalDiscount));
            }

            function bill(element) {
                var numInput = element.siblings('.number');
                var cartId = numInput.attr('data-cart-id');
                var percentDiscount = 0;
                var productDiscount = 0;
                var productPrice = parseFloat(numInput.attr('data-product-price'));

                var number = 1;


                // number
                if (numInput.val() > 0) {
                    number = numInput.val();
                }

                // discount
                if ($('#discountPrice' + cartId).length != 0) {
                    var percentDiscount = parseFloat($('#discountPrice' + cartId).attr('data-percentage-discount'));
                    var productDiscount = productPrice * (percentDiscount / 100);
                    $('#discountPrice' + cartId).html(pricePersianFormat(productDiscount * number));
                }
                // price
                if ($('#productPrice' + cartId).length != 0) {
                    var finalProductPrice = number * (productPrice - productDiscount);
                    $('#productPrice' + cartId).html(pricePersianFormat(finalProductPrice));
                }
                var itemsTotalPrice = 0;
                $('.number').each(function() {
                    var itemPrice = parseFloat($(this).attr('data-product-price'));
                    var itemTotalPrice = parseFloat(itemPrice * $(this).val());
                    itemsTotalPrice += itemTotalPrice;
                });
                var itemsTotalDiscount = 0;
                $('.discountPrice').each(function() {
                    var itemDiscount = parseFloat($(this).attr('data-product-discount'));
                    var itemTotalDiscount = parseFloat(itemDiscount * $(this).parent().parent().siblings(
                            '.align-self-start').children('.cart-product-number').children('.number')
                        .val());
                    itemsTotalDiscount += itemTotalDiscount;
                });

                $('#finalProductsPrice').html(pricePersianFormat(itemsTotalPrice));
                $('#finalDiscounts').html(pricePersianFormat(itemsTotalDiscount));
                $('#finalCartPrice').html(pricePersianFormat(itemsTotalPrice - itemsTotalDiscount));
            }

            function pricePersianFormat(price) {
                const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

                price = Intl.NumberFormat().format(price);

                return price.toString().replace(/\d/g, x => persianDigits[x]);

            }

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
            });


            // remove item from cart
            $('.removeItem').click(function(){
                var url= $(this).attr('data-url');
                var element= $(this);
                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(response){
                        if(response.status== 1){
                           element.parent().parent().remove();
                           finalPrice(); 
                        }else if(response.status== 2){
                            $('.removeItemToast').toast('show');
                        }
                    },
                })
            });
        });
    </script>
@endsection
