<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders= Banner::where('position', 0)->where('status',1)->get();
        $sideSliders= Banner::where('position', 1)->where('status',1)->orderBy('created_at', 'desc')->take(2)->get();
        $betweenSliders= Banner::where('position', 2)->where('status',1)->orderBy('created_at', 'desc')->take(2)->get();
        $bottomSlider= Banner::where('position', 3)->where('status',1)->orderBy('created_at', 'desc')->first();

        $brands= Brand::all();

        $mostVisitedProducts= Product::latest()->take(10)->get();
        $offerProducts= Product::latest()->take(10)->get();

        return view('customer.home',compact('sliders', 'sideSliders','betweenSliders','bottomSlider', 'brands', 'mostVisitedProducts', 'offerProducts'));
    }
}
