 <!-- start top-header logo, searchbox and cart -->
 <section class="top-header">
     <section class="container-xxl ">
         <section class="d-md-flex justify-content-md-between align-items-md-center py-3">

             <section class="d-flex justify-content-between align-items-center d-md-block">
                 <a class="text-decoration-none" href="{{ route('customer.home') }}"><img src="assets/images/logo/8.png"
                         alt="logo"></a>
                 <button class="btn btn-link text-dark d-md-none" type="button" data-bs-toggle="offcanvas"
                     data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                     <i class="fa fa-bars me-1"></i>
                 </button>
             </section>

             <section class="mt-3 mt-md-auto search-wrapper">
                 <section class="search-box">
                     <section class="search-textbox">
                         <span><i class="fa fa-search"></i></span>
                         <input id="search" type="text" class="" placeholder="جستجو ..." autocomplete="off">
                     </section>
                     <section class="search-result visually-hidden">
                         <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                 شیا"</span><span class="search-result-type">در دسته بندی ها</span></section>
                         <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                     class="fa fa-link"></i> دسته موبایل و وسایل جانبی</a></section>

                         <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                 شیا"</span><span class="search-result-type">در برندها</span></section>
                         <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                     class="fa fa-link"></i> برند شیائومی</a></section>
                         <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                     class="fa fa-link"></i> برند توشیبا</a></section>
                         <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                     class="fa fa-link"></i> برند شیانگ پینگ</a></section>

                         <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                 شیا"</span><span class="search-result-type">در کالاها</span></section>
                         <section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span>
                         </section>
                     </section>
                 </section>
             </section>

             <section class="mt-3 mt-md-auto text-end">
                 @auth
                     <section class="d-inline px-3">
                         <button class="btn btn-link text-decoration-none text-dark dropdown-toggle profile-button"
                             type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="fa fa-user"></i>
                         </button>
                         <section class="dropdown-menu dropdown-menu-end custom-drop-down"
                             aria-labelledby="dropdownMenuButton1">
                             <section><a class="dropdown-item" href="my-profile.html"><i
                                         class="fa fa-user-circle"></i>پروفایل کاربری</a></section>
                             <section><a class="dropdown-item" href="my-orders.html"><i
                                         class="fa fa-newspaper"></i>سفارشات</a></section>
                             <section><a class="dropdown-item" href="my-favorites.html"><i class="fa fa-heart"></i>لیست
                                     علاقه مندی</a></section>
                             <section>
                                 <hr class="dropdown-divider">
                             </section>
                             <section><a class="dropdown-item" href="{{ route('customer.auth.logout') }}"><i
                                         class="fa fa-sign-out-alt"></i>خروج</a>
                             </section>

                         </section>
                     </section>
                 @endauth

                 @guest
                     <section class="d-inline px-3">
                         <a href="{{ route('customer.auth.login-register-form') }}">
                             <i class="fa fa-user-lock"></i> ورود / ثبت نام </a>
                     </section>
                 @endguest
                 <section class="header-cart d-inline ps-3 border-start position-relative">
                     <a class="btn btn-link position-relative text-dark header-cart-link"
                         href="{{ route('customer.sales-process.cart') }}">
                         <i class="fa fa-shopping-cart"></i>
                         @auth
                            @if (count($cartItems) != 0)
                                 <span style="top: 80%;"
                                     class="position-absolute start-0 translate-middle badge rounded-pill bg-danger">{{ count($cartItems) }}</span>
                            @endif
                        @endauth
                     </a>
                     @auth

                         <section class="header-cart-dropdown">
                             <section class="border-bottom d-flex justify-content-between p-2">
                                 <span class="text-muted">{{ count($cartItems) }} کالا</span>
                                 <a class="text-decoration-none text-info"
                                     href="{{ route('customer.sales-process.cart') }}">مشاهده سبد خرید </a>
                             </section>
                             @php
                                $totalProductPrice = 0;
                                $totalDiscount = 0;
                            @endphp
                             <section class="header-cart-dropdown-body">
                                 @foreach ($cartItems as $cartItem)
                                    @php
                                    $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                    $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                    $finalPrice = $cartItem->cartItemFinalPrice();
                                    @endphp
                                     <section
                                         class="header-cart-dropdown-body-item d-flex justify-content-start align-items-center">
                                         <img class="flex-shrink-1" src="{{ asset($cartItem->product->image['indexArray']['small']) }}" alt="{{ $cartItem->product->name }}">
                                         <section class="w-100 text-truncate"><a class="text-decoration-none text-dark"
                                                 href="{{ route('customer.market.product', $cartItem->product->slug) }}">{{ $cartItem->product->name }}</a>
                                         </section>
                                         <section class="flex-shrink-1"><button type="button"
                                                 class="text-muted text-decoration-none p-1 removeItemCart"
                                                 data-url="{{ route('customer.sales-process.remove-from-cart', $cartItem->id) }}"><i
                                                     class="fa fa-trash-alt"></i></button></section>
                                     </section>
                                 @endforeach
                             </section>
                             <section
                                 class="header-cart-dropdown-footer border-top d-flex justify-content-between align-items-center p-2">
                                 <section class="">
                                     <section>مبلغ قابل پرداخت</section>
                                     <section> <span>{{ priceFormat($totalProductPrice - $totalDiscount) }}</span> تومان</section>
                                 </section>
                                 <section class=""><a class="btn btn-danger btn-sm d-block" href="cart.html">ثبت
                                         سفارش</a></section>
                             </section>
                         </section>
                     @endauth

                 </section>
             </section>
         </section>
     </section>
 </section>
 <!-- end top-header logo, searchbox and cart -->
