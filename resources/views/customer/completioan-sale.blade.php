@extends('customer.layouts.master')
@section('head-tag')
<title>تکمیل فرآیند خرید / فروشگاه آمازون</title>
@endsection

@section('content')
<!-- start cart -->
<section class="mb-4">
    <section class="container-xxl" >
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                        </h2>
                        <section class="content-header-link">
                            <!--<a href="#">مشاهده همه</a>-->
                        </section>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-9">
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        انتخاب آدرس و مشخصات گیرنده
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>

                            <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                <secrion>
                                    آدرس را انتخاب کنید.
                                </secrion>
                            </section>


                            <section class="address-select">
                                @foreach ($addresses as $address)
                                <input type="radio" name="address" value="1" id="{{$loop->iteration}}"/> <!--checked="checked"-->
                                <label for="{{$loop->iteration}}" class="address-wrapper mb-2 p-2">
                                    <section class="mb-2">
                                        <i class="fa fa-map-marker-alt mx-1"></i>
                                        آدرس : {{ $address->city->province->name. " ".$address->city->name. " " . $address->address }}
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-user-tag mx-1"></i>
                                        گیرنده : {{ $address->recipient_first_name?? "-" }}  {{  $address->recipient_last_name?? "-" }}
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-mobile-alt mx-1"></i>
                                        موبایل گیرنده : {{ $address->mobile?? "-" }}
                                    </section>
                                    <a class="" data-bs-toggle="modal" data-bs-target="#edit-address{{$address->id}}"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                    <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                </label>
                                <!-- start edit address Modal -->
                                    <section class="modal fade" id="edit-address{{$address->id}}" tabindex="-1" aria-labelledby="edit-address-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ویرایش آدرس</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </section>
                                                <section class="modal-body">
                                                    <form class="row" action="{{ route('customer.sales-process.completion-sale.update-address-delivery', $address->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <section class="col-6 mb-2">
                                                            <label for="provinceEdit{{$address->id}}" class="form-label mb-1">استان</label>
                                                            <select class="form-select form-select-sm provinceEdit" id="provinceEdit{{$address->id}}" name="province">
                                                                <option val=''>استان را انتخاب کنید</option>
                                                                @foreach($provinces as $province)
                                                                <option @if(old('province', $address->city->province->id) == $province->id) selected @endif data-url="{{ route('customer.sales-process.completion-sale.set-address-delivery.get-cities', $province->id) }}" value="{{$province->id}}">{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </section>
                                                        @php
                                                        $province= $address->city->province;
                                                        @endphp
                                                        <section class="col-6 mb-2 citySection">
                                                            <label for="cityEdit{{$address->id}}" class="form-label mb-1">شهر</label>
                                                            <select class="form-select form-select-sm cityEdit" id="cityEdit{{$address->id}}" name="city_id">
                                                                <option val=''>شهر را انتخاب کنید</option>
                                                                @foreach($province->cities as $city)
                                                                <option @if(old('city_id', $address->city->id) == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </section>
                                                        <section class="col-12 mb-2">
                                                            <label for="address{{$address->id}}" class="form-label mb-1">نشانی</label>
                                                            <input value='{{old('address', $address->address)}}' type="text" name="address" class="form-control form-control-sm" id="address{{$address->id}}" placeholder="نشانی">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="postal_code{{$address->id}}" class="form-label mb-1">کد پستی</label>
                                                            <input value='{{old('postal_code', $address->postal_code)}}' type="text" name="postal_code" class="form-control form-control-sm" id="postal_code{{$address->id}}" placeholder="کد پستی">
                                                            
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="no{{$address->id}}" class="form-label mb-1">پلاک</label>
                                                            <input value='{{old('no', $address->no)}}' type="text" name="no" class="form-control form-control-sm" id="no{{$address->id}}" placeholder="پلاک">
                                                            
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="unit{{$address->id}}" class="form-label mb-1">واحد</label>
                                                            <input value='{{old('unit', $address->unit)}}' type="text" name="unit" class="form-control form-control-sm" id="unit{{$address->id}}" placeholder="واحد">
                                                            
                                                        </section>

                                                        <section class="border-bottom mt-2 mb-3"></section>

                                                        <section class="col-12 mb-2">
                                                            <section class="form-check">
                                                                <input class="form-check-input" name="my_self_reciever" type="checkbox" id="receiver{{$address->id}}" @empty($address->recipient_first_name) checked @endempty>
                                                                <label class="form-check-label" for="receiver{{$address->id}}">
                                                                    گیرنده سفارش خودم هستم
                                                                </label>
                                                                
                                                            </section>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="first_name{{$address->id}}" class="form-label mb-1">نام گیرنده</label>
                                                            <input value='{{old('recipient_first_name', $address->recipient_first_name)}}' type="text" name="recipient_first_name" class="form-control form-control-sm" id="first_name{{$address->id}}" placeholder="نام گیرنده">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="last_name{{$address->id}}" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                            <input value='{{old('recipient_last_name', $address->recipient_last_name)}}' type="text" name="recipient_last_name" class="form-control form-control-sm" id="last_name{{$address->id}}" placeholder="نام خانوادگی گیرنده">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="mobile{{$address->id}}" class="form-label mb-1">شماره موبایل</label>
                                                            <input value='{{old('mobile', $address->mobile)}}' type="text" name="mobile" class="form-control form-control-sm" id="mobile{{$address->id}}" placeholder="شماره موبایل">
                                                            
                                                        </section>
                                                        <button type="submit" class="btn btn-sm btn-primary">ویرایش آدرس</button>
                                                    </form>
                                                </section>
                                                <section class="modal-footer py-1">
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                <!-- end edit address Modal -->
                                @endforeach

                                <section class="address-add-wrapper">
                                    <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address" ><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
                                    <!-- start add address Modal -->
                                    <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </section>
                                                <section class="modal-body">
                                                    <form class="row" action="{{ route('customer.sales-process.completion-sale.set-address-delivery') }}" method="POST">
                                                        @csrf
                                                        <section class="col-6 mb-2">
                                                            <label for="province" class="form-label mb-1">استان</label>
                                                            <select class="form-select form-select-sm" id="province" name="province">
                                                                <option val=''>استان را انتخاب کنید</option>
                                                                @foreach($provinces as $province)
                                                                <option @if (old('province') == $province->id) selected @endif data-url="{{ route('customer.sales-process.completion-sale.set-address-delivery.get-cities', $province->id) }}" value="{{$province->id}}">{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="city" class="form-label mb-1">شهر</label>
                                                            <select class="form-select form-select-sm" id="city" name="city_id">
                                                                <option val=''>شهر را انتخاب کنید</option>
                                                            </select>
                                                            
                                                        </section>
                                                        <section class="col-12 mb-2">
                                                            <label for="address" class="form-label mb-1">نشانی</label>
                                                            <input value='{{old('address')}}' type="text" name="address" class="form-control form-control-sm" id="address" placeholder="نشانی">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                            <input value='{{old('postal_code')}}' type="text" name="postal_code" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی">
                                                            
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="no" class="form-label mb-1">پلاک</label>
                                                            <input value='{{old('no')}}' type="text" name="no" class="form-control form-control-sm" id="no" placeholder="پلاک">
                                                            
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="unit" class="form-label mb-1">واحد</label>
                                                            <input value='{{old('unit')}}' type="text" name="unit" class="form-control form-control-sm" id="unit" placeholder="واحد">
                                                            
                                                        </section>

                                                        <section class="border-bottom mt-2 mb-3"></section>

                                                        <section class="col-12 mb-2">
                                                            <section class="form-check">
                                                                <input class="form-check-input" name="my_self_reciever" type="checkbox" id="receiver" checked>
                                                                <label class="form-check-label" for="receiver">
                                                                    گیرنده سفارش خودم هستم
                                                                </label>
                                                                
                                                            </section>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                            <input value='{{old('recipient_first_name')}}' type="text" name="recipient_first_name" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                            <input value='{{old('recipient_last_name')}}' type="text" name="recipient_last_name" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده">
                                                            
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                            <input value='{{old('mobile')}}' type="text" name="mobile" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل">
                                                            
                                                        </section>
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                    </form>
                                                </section>
                                                <section class="modal-footer py-1">
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                    <!-- end add address Modal -->
                                </section>

                            </section>
                        </section>
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        انتخاب نحوه ارسال
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="delivery-select ">

                                <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر بگیرید.
                                    </secrion>
                                </section>

                                <input type="radio" name="delivery_type" value="1" id="d1"/>
                                <label for="d1" class="col-4 delivery-wrapper mb-2 pt-2">
                                    <section class="mb-2">
                                        <i class="fa fa-shipping-fast mx-1"></i>
                                        پست پیشتاز
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-calendar-alt mx-1"></i>
                                        تامین کالا از 4 روز کاری آینده
                                    </section>
                                </label>

                                <input type="radio" name="delivery_type" value="2" id="d2"/>
                                <label for="d2" class="col-4 delivery-wrapper mb-2 pt-2">
                                    <section class="mb-2">
                                        <i class="fa fa-shipping-fast mx-1"></i>
                                        تیپاکس
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-calendar-alt mx-1"></i>
                                        تامین کالا از 2 روز کاری آینده
                                    </section>
                                </label>


                            </section>
                        </section>
                    </section>
                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{ count($cartItems) }})</p>
                                <p class="text-muted"><span
                                        id="finalProductsPrice">{{ priceFormat($prices['totalProductPrice']) }}</span> تومان
                                </p>
                            </section>
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالاها</p>
                                <p class="text-danger fw-bolder"><span
                                        id="finalDiscounts">{{ priceFormat($prices['totalDiscount']) }}</span> تومان</p>
                            </section>
                            <section class="border-bottom mb-3"></section>
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع سبد خرید</p>
                                <p class="fw-bolder"><span
                                        id="finalCartPrice">{{ priceFormat($prices['finalPrice']) }}</span>
                                    تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت
                                سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید.
                                نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این
                                سفارش صورت میگیرد.
                            </p>


                            <section class="">
                                <button type="button" onclick="document.getElementById('cart_items').submit()" class="btn btn-danger d-block">تکمیل فرآیند خرید</button>
                            </section>
                            </form>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- toast alert start-->
        <div class="position-fixed p-3" style="z-index: 909999999; left: 0; top: 3rem; width: 26rem; max-width: 80%;">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                 data-delay="4000">

                <div class="toast-body bg-red-600 rounded-md flex flex-col gap-y-3">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="text-white">{{$error}}</div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- toast alert end-->
    </section>
</section>
<!-- end cart -->

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#province').change(function () {
            let element = $('#province option:selected');
            let url = element.attr('data-url');

            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    if (response.cities && response.status) {
                        let cities = response.cities;
                        let citySelect = $('#city');
                        citySelect.empty();
                        cities.map(city => {
                            citySelect.append($('<option>').val(city.id).text(city.name));
                        });
                    } else {
                        $('#city').empty();
                    }
                },
                error: function () {
                    $('#city').empty();
                }
            });
        });
        
        $('.provinceEdit').change(function () {
            let thisProvince= $(this);
            let element = $(this).children('option:selected');
            let url = element.attr('data-url');
            let citySelect = thisProvince.parent().siblings('.citySection').children('.cityEdit');

            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    if (response.cities && response.status) {
                        let cities = response.cities;
                        citySelect.empty();
                        cities.map(city => {
                            citySelect.append($('<option>').val(city.id).text(city.name));
                        })
                    } else {
                       citySelect.empty();
                    }
                },
                error: function () {
                    citySelect.empty();
                }
            });
        });
    });
</script>
@if($errors->any())
<script>
    $(document).ready(function() {
        $('#liveToast').toast('show');
    });
</script>
@endif
@endsection
