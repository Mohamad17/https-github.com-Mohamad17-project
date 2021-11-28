<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\Market\OffTicketController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;

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
Route::prefix('admin')->namespace('Admin')->group(function () {
  Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');
  // market group
  Route::prefix('market')->namespace('Market')->group(function () {
    // category
    Route::prefix('category')->group(function () {
      Route::get('/', [CategoryController::class, 'index'])->name('admin.market.category.index');
      Route::get('/create', [CategoryController::class, 'create'])->name('admin.market.category.create');
      Route::post('/store', [CategoryController::class, 'store'])->name('admin.market.category.store');
      Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
      Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.market.category.update');
      Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
    });
    // brand
    Route::prefix('brand')->group(function () {
      Route::get('/', [BrandController::class, 'index'])->name('admin.market.brand.index');
      Route::get('/create', [BrandController::class, 'create'])->name('admin.market.brand.create');
      Route::post('/store', [BrandController::class, 'store'])->name('admin.market.brand.store');
      Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.market.brand.edit');
      Route::put('/update/{id}', [BrandController::class, 'update'])->name('admin.market.brand.update');
      Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('admin.market.brand.destroy');
    });
    // comment group
    Route::prefix('comment')->group(function () {
      Route::get('/', [CommentController::class, 'index'])->name('admin.market.comment.index');
      Route::post('/store', [CommentController::class, 'store'])->name('admin.market.comment.store');
      Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('admin.market.comment.edit');
      Route::put('/update/{id}', [CommentController::class, 'update'])->name('admin.market.comment.update');
      Route::get('/show', [CommentController::class, 'show'])->name('admin.market.comment.show');
    });
    //delivety group
    Route::prefix('delivery')->group(function () {
      Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
      Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
      Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
      Route::get('/edit/{id}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
      Route::put('/update/{id}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
      Route::delete('/delete/{id}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
    });
    //off group
    Route::prefix('discount')->group(function () {
      Route::get('/coupon', [OffTicketController::class, 'coupon'])->name('admin.market.discount.coupon');
      Route::get('/coupon/create', [OffTicketController::class, 'couponCreate'])->name('admin.market.discount.coupon.create');
      Route::get('/common-discount', [OffTicketController::class, 'commonDiscount'])->name('admin.market.discount.common');
      Route::get('/common-discount/create', [OffTicketController::class, 'commonDiscountCreate'])->name('admin.market.discountCommon.create');
      Route::get('/amazing-sale', [OffTicketController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
      Route::get('/amazing-sale/create', [OffTicketController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
    });
    //order group
    Route::prefix('order')->group(function () {
      Route::get('/', [OrderController::class, 'allOrder'])->name('admin.market.order.allOrder');
      Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.new');
      Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
      Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
      Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
      Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
      Route::get('/change-send-status', [OrderController::class, 'sendStatus'])->name('admin.market.order.sendStatus');
      Route::get('/change-order-status', [OrderController::class, 'orderStatus'])->name('admin.market.order.orderStatus');
      Route::get('/cancel-order', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
      Route::get('/show/{id}', [OrderController::class, 'showOrder'])->name('admin.market.order.show');
    });
    //payment group
    Route::prefix('payment')->group(function () {
      Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
      Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
      Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
      Route::get('/attendance', [PaymentController::class, 'attendance'])->name('admin.market.payment.attendance');
      Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
    });
    //products group
    Route::prefix('product')->group(function () {
      Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
      Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
      Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
      Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
      Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.market.product.update');
      Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');
    });
    //property group
    Route::prefix('property')->group(function () {
      Route::get('/', [PropertyController::class, 'index'])->name('admin.market.property.index');
      Route::get('/create', [PropertyController::class, 'create'])->name('admin.market.property.create');
      Route::post('/store', [PropertyController::class, 'store'])->name('admin.market.property.store');
      Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('admin.market.property.edit');
      Route::put('/update/{id}', [PropertyController::class, 'update'])->name('admin.market.property.update');
      Route::delete('/delete/{id}', [PropertyController::class, 'destroy'])->name('admin.market.property.destroy');
    });
    //store group
    Route::prefix('store')->group(function () {
      Route::get('/', [StoreController::class, 'index'])->name('admin.market.store.index');
      Route::get('/add-to-store', [StoreController::class, 'addToStore'])->name('admin.market.store.add-to-store');
      Route::post('/store', [StoreController::class, 'store'])->name('admin.market.store.store');
      Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.market.store.edit');
      Route::put('/update/{id}', [StoreController::class, 'update'])->name('admin.market.store.update');
      Route::delete('/delete/{id}', [StoreController::class, 'destroy'])->name('admin.market.store.destroy');
    });
  });

  // content group
  Route::prefix('content')->namespace('Content')->group(function () {
    // category
    Route::prefix('category')->group(function () {
      Route::get('/', [ContentCategoryController::class, 'index'])->name('admin.content.category.index');
      Route::get('/create', [ContentCategoryController::class, 'create'])->name('admin.content.category.create');
      Route::post('/store', [ContentCategoryController::class, 'store'])->name('admin.content.category.store');
      Route::get('/edit/{id}', [ContentCategoryController::class, 'edit'])->name('admin.content.category.edit');
      Route::put('/update/{id}', [ContentCategoryController::class, 'update'])->name('admin.content.category.update');
      Route::delete('/delete/{id}', [ContentCategoryController::class, 'destroy'])->name('admin.content.category.destroy');
    });
    // comment group
    Route::prefix('comment')->group(function () {
      Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
      Route::post('/store', [ContentCommentController::class, 'store'])->name('admin.content.comment.store');
      Route::get('/edit/{id}', [ContentCommentController::class, 'edit'])->name('admin.content.comment.edit');
      Route::put('/update/{id}', [ContentCommentController::class, 'update'])->name('admin.content.comment.update');
      Route::get('/show', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
    });
    // faq group
    Route::prefix('faq')->group(function () {
      Route::get('/', [FAQController::class, 'index'])->name('admin.content.faq.index');
      Route::get('/create', [FAQController::class, 'create'])->name('admin.content.faq.create');
      Route::post('/store', [FAQController::class, 'store'])->name('admin.content.faq.store');
      Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('admin.content.faq.edit');
      Route::put('/update/{id}', [FAQController::class, 'update'])->name('admin.content.faq.update');
      Route::delete('/delete/{id}', [FAQController::class, 'destroy'])->name('admin.content.faq.destroy');
    });
    // menu group
    Route::prefix('menu')->group(function () {
      Route::get('/', [MenuController::class, 'index'])->name('admin.content.menu.index');
      Route::get('/create', [MenuController::class, 'create'])->name('admin.content.menu.create');
      Route::post('/store', [MenuController::class, 'store'])->name('admin.content.menu.store');
      Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('admin.content.menu.edit');
      Route::put('/update/{id}', [MenuController::class, 'update'])->name('admin.content.menu.update');
      Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('admin.content.menu.destroy');
    });
    // page group
    Route::prefix('page')->group(function () {
      Route::get('/', [PageController::class, 'index'])->name('admin.content.page.index');
      Route::get('/create', [PageController::class, 'create'])->name('admin.content.page.create');
      Route::post('/store', [PageController::class, 'store'])->name('admin.content.page.store');
      Route::get('/edit/{id}', [PageController::class, 'edit'])->name('admin.content.page.edit');
      Route::put('/update/{id}', [PageController::class, 'update'])->name('admin.content.page.update');
      Route::delete('/delete/{id}', [PageController::class, 'destroy'])->name('admin.content.page.destroy');
    });
    // post group
    Route::prefix('post')->group(function () {
      Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
      Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
      Route::post('/store', [PostController::class, 'store'])->name('admin.content.post.store');
      Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.content.post.edit');
      Route::put('/update/{id}', [PostController::class, 'update'])->name('admin.content.post.update');
      Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('admin.content.post.destroy');
    });
  });

  // user group
  Route::prefix('user')->namespace('User')->group(function () {
    // admin-user group
    Route::prefix('admin-user')->group(function () {
      Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
      Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
      Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
      Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
      Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
      Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
    });
    // customer group
    Route::prefix('customer')->group(function () {
      Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
      Route::get('/create', [CustomerController::class, 'create'])->name('admin.user.customer.create');
      Route::post('/store', [CustomerController::class, 'store'])->name('admin.user.customer.store');
      Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.user.customer.edit');
      Route::put('/update/{id}', [CustomerController::class, 'update'])->name('admin.user.customer.update');
      Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('admin.user.customer.destroy');
    });
    // role group
    Route::prefix('role')->group(function () {
      Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
      Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
      Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
      Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
      Route::put('/update/{id}', [RoleController::class, 'update'])->name('admin.user.role.update');
      Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
    });
    // permission group
    Route::prefix('permission')->group(function () {
      Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
      Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
      Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
      Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
      Route::put('/update/{id}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
      Route::delete('/delete/{id}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
    });
  });

  // notify group
  Route::prefix('notify')->namespace('Notify')->group(function () {
    // email group
    Route::prefix('email')->group(function () {
      Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
      Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
      Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
      Route::get('/edit/{id}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
      Route::put('/update/{id}', [EmailController::class, 'update'])->name('admin.notify.email.update');
      Route::delete('/delete/{id}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
    });
    // sms group
    Route::prefix('sms')->group(function () {
      Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
      Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
      Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
      Route::get('/edit/{id}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
      Route::put('/update/{id}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
      Route::delete('/delete/{id}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
    });
  });

  // tickets group
  Route::prefix('tickets')->namespace('Tickets')->group(function () {
    Route::get('/new-ticket', [TicketController::class, 'newTicket'])->name('admin.tickets.new-ticket');
    Route::get('/open-ticket', [TicketController::class, 'openTicket'])->name('admin.tickets.open-ticket');
    Route::get('/close-ticket', [TicketController::class, 'closeTicket'])->name('admin.tickets.close-ticket');
    Route::get('/', [TicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/show', [TicketController::class, 'show'])->name('admin.tickets.show');
    Route::get('/create', [TicketController::class, 'create'])->name('admin.tickets.create');
    Route::post('/store', [TicketController::class, 'store'])->name('admin.tickets.store');
    Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('admin.tickets.edit');
    Route::put('/update/{id}', [TicketController::class, 'update'])->name('admin.tickets.update');
    Route::delete('/delete/{id}', [TicketController::class, 'destroy'])->name('admin.tickets.destroy');
  });

  // setting group
  Route::prefix('setting')->namespace('Setting')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::get('/create', [SettingController::class, 'create'])->name('admin.setting.create');
    Route::post('/store', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');
    Route::delete('/delete/{id}', [SettingController::class, 'destroy'])->name('admin.setting.destroy');
  });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
