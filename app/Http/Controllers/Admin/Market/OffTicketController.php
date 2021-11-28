<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffTicketController extends Controller
{

    public function coupon()
    {
        return view('admin.market.discount.coupon.index');
    }

    public function couponCreate()
    {
        return view('admin.market.discount.coupon.create');
    }
    public function commonDiscount()
    {
        return view('admin.market.discount.common.index');
    }

    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common.create');
    }
    public function amazingSale()
    {
        return view('admin.market.discount.amazing-sale.index');
    }

    public function amazingSaleCreate()
    {
        return view('admin.market.discount.amazing-sale.create');
    }
}
