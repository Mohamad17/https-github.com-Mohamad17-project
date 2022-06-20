@extends('admin.layouts.master')
@section('head-tag')
    <title>نمایش سفارش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">سفارشات</li>
            <li class="breadcrumb-item active" aria-current="page">نمایش سفارش</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>نمایش سفارش</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.order.allOrder') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover font-size-8">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col" class="width-16rem"></th>
                            <th scope="col" class="max-width-44rem row flex-row-reverse">
                                <div class="row">
                                    <button type="button" onclick="print()" class="btn btn-dark btn-sm my-3 ml-3"><i class="fas fa-print"></i> چاپ</button>
                                    <a href="{{ route('admin.market.order.details', $order->id) }}" class="btn btn-info btn-sm my-3"><i class="fas fa-book"></i> جزئیات</a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="printable">
                        <tr>
                            <td>نام مشتری</td>
                            <td class="width-44rem text-left">{{ $order->user->full_name }}</td>
                        </tr>
                        <tr>
                            <td>آدرس</td>
                            <td class="width-44rem text-left">{{ $order->address->address }}</td>
                        </tr>
                        <tr>
                            <td>شهر</td>
                            <td class="width-44rem text-left">{{ $order->address->city->name }}</td>
                        </tr>
                        <tr>
                            <td>استان</td>
                            <td class="width-44rem text-left">{{ $order->address->city->province->name }}</td>
                        </tr>
                        <tr>
                            <td>کد پستی</td>
                            <td class="width-44rem text-left">{{ $order->address->postal_code }}</td>
                        </tr>
                        <tr>
                            <td>پلاک</td>
                            <td class="width-44rem text-left">{{ $order->address->no }}</td>
                        </tr>
                        <tr>
                            <td>واحد</td>
                            <td class="width-44rem text-left">{{ $order->address->unit }}</td>
                        </tr>
                        <tr>
                            <td>همراه</td>
                            <td class="width-44rem text-left">{{ $order->address->mobile }}</td>
                        </tr>
                        <tr>
                            <td>وضعیت پرداخت</td>
                            <td class="width-44rem text-left">{{ paymentsStatus($order->payment_status) }}</td>
                        </tr>
                        <tr>
                            <td>نوع پرداخت</td>
                            <td class="width-44rem text-left">{{ paymentsType($order->payment_type) }}</td>
                        </tr>
                        <tr>
                            <td>مبلغ ارسال</td>
                            <td class="width-44rem text-left">{{ $order->delivery_amount }}</td>
                        </tr>
                        <tr>
                            <td>وضعیت ارسال</td>
                            <td class="width-44rem text-left">{{ deliveryStatus($order->delivery_status) }}</td>
                        </tr>
                        <tr>
                            <td>تاریخ ارسال</td>
                            <td class="width-44rem text-left">{{ date_to_persian($order->delivery_date) }}</td>
                        </tr>
                        <tr>
                            <td>مجموع مبلغ سفارش (بدون تخفیف)</td>
                            <td class="width-44rem text-left">{{ $order->order_final_amount }} تومان</td>
                        </tr>
                        <tr>
                            <td>مجموع تمامی مبلغ تخفیفات</td>
                            <td class="width-44rem text-left">{{ $order->order_discount_amount }} تومان</td>
                        </tr>
                        <tr>
                            <td>مبلغ تخفیف همه محصولات</td>
                            <td class="width-44rem text-left">{{ $order->order_total_products_discount_amount }} تومان</td>
                        </tr>
                        <tr>
                            <td>مبلغ نهایی </td>
                            <td class="width-44rem text-left">{{ $order->order_final_amount -  $order->order_discount_amount }} تومان</td>
                        </tr>
                        <tr>
                            <td>بانک</td>
                            <td class="width-44rem text-left">{{ $order->payment->paymentable->gateway ??"-" }} تومان</td>
                        </tr>
                        <tr>
                            <td>کوپن استفاده شده</td>
                            <td class="width-44rem text-left">{{ $order->copan->code ??"-" }}</td>
                        </tr>
                        <tr>
                            <td>مبلغ کوپن استفاده شده</td>
                            <td class="width-44rem text-left">{{ $order->order_copan_discount_amount ??"-" }}</td>
                        </tr>
                        <tr>
                            <td>تخفیف عمومی استفاده شده</td>
                            <td class="width-44rem text-left">{{ $order->commonDiscount->title ??"-" }}</td>
                        </tr>
                        <tr>
                            <td>مبلغ تخفیف عمومی استفاده شده</td>
                            <td class="width-44rem text-left">{{ $order->order_common_discount_amount ??"-" }}</td>
                        </tr>
                        <tr>
                            <td>وضعیت سفارش</td>
                            <td class="width-44rem text-left">{{ orderStatus($order->order_status) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function print(){
            console.log('print')
            var pageRestore= $('body').html();
            var printContent= $('#printable').clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(pageRestore);
        }
    </script>
@endsection
