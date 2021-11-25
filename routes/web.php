<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\offTicketController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/',[AdminDashboardController::class,'index'])->name('admin.home');
    // market group
    Route::prefix('market')->namespace('Market')->group(function(){
        // category
       Route::prefix('category')->group(function(){
         Route::get('/',[CategoryController::class,'index'])->name('admin.market.category.index');
         Route::get('/create',[CategoryController::class,'create'])->name('admin.market.category.create');
         Route::post('/store',[CategoryController::class,'store'])->name('admin.market.category.store');
         Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.market.category.edit');
         Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.market.category.update');
         Route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('admin.market.category.destroy');
        });
        // brand
        Route::prefix('brand')->group(function(){
          Route::get('/',[BrandController::class,'index'])->name('admin.market.brand.index');
          Route::get('/create',[BrandController::class,'create'])->name('admin.market.brand.create');
          Route::post('/store',[BrandController::class,'store'])->name('admin.market.brand.store');
          Route::get('/edit/{id}',[BrandController::class,'edit'])->name('admin.market.brand.edit');
          Route::put('/update/{id}',[BrandController::class,'update'])->name('admin.market.brand.update');
          Route::delete('/delete/{id}',[BrandController::class,'destroy'])->name('admin.market.brand.destroy');
         });
        // comment group
        Route::prefix('comment')->group(function(){
          Route::get('/',[CommentController::class,'index'])->name('admin.market.comment.index');
          Route::post('/store',[CommentController::class,'store'])->name('admin.market.comment.store');
          Route::get('/edit/{id}',[CommentController::class,'edit'])->name('admin.market.comment.edit');
          Route::put('/update/{id}',[CommentController::class,'update'])->name('admin.market.comment.update');
          Route::get('/show',[CommentController::class,'show'])->name('admin.market.comment.show');
        });
        //delivety group
        Route::prefix('delivery')->group(function(){
          Route::get('/',[DeliveryController::class,'index'])->name('admin.market.delivery.index');
          Route::get('/create',[DeliveryController::class,'create'])->name('admin.market.delivery.create');
          Route::post('/store',[DeliveryController::class,'store'])->name('admin.market.delivery.store');
          Route::get('/edit/{id}',[DeliveryController::class,'edit'])->name('admin.market.delivery.edit');
          Route::put('/update/{id}',[DeliveryController::class,'update'])->name('admin.market.delivery.update');
          Route::delete('/delete/{id}',[DeliveryController::class,'destroy'])->name('admin.market.delivery.destroy');
         });
        //off group
        Route::prefix('discount')->group(function(){
          Route::get('/coupon',[offTicketController::class,'coupon'])->name('admin.market.discount.coupon');
          Route::get('/coupon/create',[offTicketController::class,'couponCreate'])->name('admin.market.discount.coupon.create');
          Route::get('/common-discount',[offTicketController::class,'commonDiscount'])->name('admin.market.discount.common');
          Route::get('/common-discount/create',[offTicketController::class,'commonDiscountCreate'])->name('admin.market.discountCommon.create');
          Route::get('/amazing-sale',[offTicketController::class,'amazingSale'])->name('admin.market.discount.amazingSale');
          Route::get('/amazing-sale/create',[offTicketController::class,'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');        
         });
        //order group
        Route::prefix('order')->group(function(){
          Route::get('/',[OrderController::class,'allOrder'])->name('admin.market.order.allOrder');
          Route::get('/new-order',[OrderController::class,'newOrders'])->name('admin.market.order.new');
          Route::get('/sending',[OrderController::class,'sending'])->name('admin.market.order.sending');
          Route::get('/unpaid',[OrderController::class,'unpaid'])->name('admin.market.order.unpaid');
          Route::get('/canceled',[OrderController::class,'canceled'])->name('admin.market.order.canceled');
          Route::get('/returned',[OrderController::class,'returned'])->name('admin.market.order.returned');
          Route::get('/change-send-status',[OrderController::class,'sendStatus'])->name('admin.market.order.sendStatus');
          Route::get('/change-order-status',[OrderController::class,'orderStatus'])->name('admin.market.order.orderStatus');
          Route::get('/cancel-order',[OrderController::class,'cancelOrder'])->name('admin.market.order.cancelOrder');
          Route::get('/show/{id}',[OrderController::class,'showOrder'])->name('admin.market.order.show');
         });
        //payment group
        Route::prefix('payment')->group(function(){
           Route::get('/',[PaymentController::class,'index'])->name('admin.market.payment.index'); 
           Route::get('/online',[PaymentController::class,'online'])->name('admin.market.payment.online'); 
           Route::get('/offline',[PaymentController::class,'offline'])->name('admin.market.payment.offline'); 
           Route::get('/attendance',[PaymentController::class,'attendance'])->name('admin.market.payment.attendance'); 
           Route::get('/confirm',[PaymentController::class,'confirm'])->name('admin.market.payment.confirm'); 
        });
    });

});