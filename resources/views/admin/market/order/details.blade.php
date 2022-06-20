@extends('admin.layouts.master')
@section('head-tag')
    <title>جزئیات سفارش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">سفارشات</li>
            <li class="breadcrumb-item active" aria-current="page">جزئیات سفارش</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>جزئیات سفارش</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.order.allOrder') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover font-size-8">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>نام محصول</th>
                            <th>درصد فروش فوق العاده</th>
                            <th>مبلغ فروش فوق العاده</th>
                            <th>تعداد</th>
                            <th>قیمت محصول</th>
                            <th>مبلغ نهایی</th>
                            <th>رنگ</th>
                            <th>گارانتی</th>
                            <th>ویژگی ها</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $orderItem)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $orderItem->single_product->name }}</td>
                                <td>{{ $orderItem->amazingSale->percentage?? '-' }} ٪</td>
                                <td>{{ $orderItem->amazing_sale_discount_amount." تومان" ?? '-' }}</td>
                                <td>{{ $orderItem->number }}</td>
                                <td>{{ $orderItem->final_product_price }} تومان</td>
                                <td>{{ $orderItem->final_total_price }} تومان</td>
                                <td>{{ $orderItem->color->name ?? '-' }}</td>
                                <td>{{ $orderItem->guarantee->name ?? '-' }}</td>
                                <td>
                                    <ul>
                                       @forelse ($orderItem->orderItemAttributes as $attribute)
                                           <li>{{ $attribute->categoryAttribute->name.' - '.json_decode($attribute->categoryValue->value)->value }}</li>
                                       @empty
                                       <li> - </li> 
                                       @endforelse
                                    </ul>
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
