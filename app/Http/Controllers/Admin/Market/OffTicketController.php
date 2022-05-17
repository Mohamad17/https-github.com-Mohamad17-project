<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\User;
use App\Models\Market\Copan;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\AmazingSale;
use App\Http\Controllers\Controller;
use App\Models\Market\CommonDiscount;
use App\Http\Requests\Admin\Market\CopanRequest;
use App\Http\Requests\Admin\Market\AmazingSalesRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;

class OffTicketController extends Controller
{
    // copan methods
    public function copan()
    {
        $copans= Copan::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.market.discount.copan.index', compact('copans'));
    }

    public function copanCreate()
    {
        $users= User::all();
        return view('admin.market.discount.copan.create', compact('users'));
    }

    public function copanStore(CopanRequest $request)
    {
        // dd($request->all());
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        Copan::create($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success','کپن تخفیف شما با موفقیت اضافه شد');
    }

    public function copanEdit(Copan $copan)
    {
        $users= User::all();
        return view('admin.market.discount.copan.edit', compact('copan', 'users'));
    }

    public function copanUpdate(CopanRequest $request, Copan $copan)
    {
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        if(!isset($inputs['user_id'])){
            $inputs['user_id']= null;
        }
        $copan->update($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success','کپن تخفیف شما با موفقیت ویرایش شد');
    }

    public function copanDestroy(Copan $copan){
        $copan->delete();
        return back()->with('swal-success','کپن تخفیف شما با موفقیت حذف شد');
    }

    // end copan methods

    //common discount methods

    public function commonDiscount()
    {
        $discounts= CommonDiscount::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.market.discount.common.index', compact('discounts'));
    }

    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common.create');
    }

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        // dd($request->all());
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        CommonDiscount::create($inputs);
        return redirect()->route('admin.market.discount.common')->with('swal-success','کپن تخفیف عمومی شما با موفقیت اضافه شد');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount)
    {
        return view('admin.market.discount.common.edit', compact('commonDiscount'));
    }

    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        $commonDiscount->update($inputs);
        return redirect()->route('admin.market.discount.common')->with('swal-success','کپن تخفیف عمومی شما با موفقیت ویرایش شد');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount){
        $commonDiscount->delete();
        return back()->with('swal-success','کپن تخفیف عمومی شما با موفقیت حذف شد');
    }

    //end of common discount methods



    //amazing sales methods
    
    public function amazingSale()
    {
        $amazinfSales=AmazingSale::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.market.discount.amazing-sale.index', compact('amazinfSales'));
    }

    public function amazingSaleCreate()
    {
        $products= Product::all();
        return view('admin.market.discount.amazing-sale.create', compact('products'));
    }

    public function amazingSaleStore(AmazingSalesRequest $request)
    {
        // dd($request->all());
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        AmazingSale::create($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success','فروش شگفت انگیز شما با موفقیت اضافه شد');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale)
    {
        $products= Product::all();
        return view('admin.market.discount.amazing-sale.edit', compact('amazingSale', 'products'));
    }

    public function amazingSaleUpdate(AmazingSalesRequest $request, AmazingSale $amazingSale)
    {
        $inputs= $request->all();
        $timestampStart= substr($request->start_date, 0, 10);
        $inputs['start_date']= date('Y-m-d H:i:s', (int)$timestampStart);
        $timestampEnd= substr($request->end_date, 0, 10);
        $inputs['end_date']= date('Y-m-d H:i:s', (int)$timestampEnd);
        $amazingSale->update($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success','فروش شگفت انگیز شما با موفقیت ویرایش شد');
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale){
        $amazingSale->delete();
        return back()->with('swal-success','فروش شگفت انگیز شما با موفقیت حذف شد');
    }


    //end of amazing sales methods

}
