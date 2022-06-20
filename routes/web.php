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
use App\Http\Controllers\Admin\Content\BannerController;
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
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Market\ProductColorController;
use App\Http\Controllers\Admin\Market\ProductGalleryController;
use App\Http\Controllers\Admin\Ticket\CategoryTicketController;
use App\Http\Controllers\Admin\Ticket\PriorityTicketController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Market\ProductGuaranteeController;
use App\Http\Controllers\Admin\Market\PropertyValueController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Notification\NotificationController;

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
      Route::get('/edit/{productCategory}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
      Route::put('/update/{productCategory}', [CategoryController::class, 'update'])->name('admin.market.category.update');
      Route::delete('/delete/{productCategory}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
      Route::get('/status/{productCategory}', [CategoryController::class, 'status'])->name('admin.market.category.status');
      Route::get('/show-in-menu/{productCategory}', [CategoryController::class, 'showInMenu'])->name('admin.market.category.showInMenu');
    });
    // brand
    Route::prefix('brand')->group(function () {
      Route::get('/', [BrandController::class, 'index'])->name('admin.market.brand.index');
      Route::get('/create', [BrandController::class, 'create'])->name('admin.market.brand.create');
      Route::post('/store', [BrandController::class, 'store'])->name('admin.market.brand.store');
      Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.market.brand.edit');
      Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.market.brand.update');
      Route::delete('/delete/{brand}', [BrandController::class, 'destroy'])->name('admin.market.brand.destroy');
    });
    // comment group
    Route::prefix('comment')->group(function () {
      Route::get('/', [CommentController::class, 'index'])->name('admin.market.comment.index');
      Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.market.comment.show');
      Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.market.comment.answer');
      Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.market.comment.status');
      Route::get('/approve/{comment}', [CommentController::class, 'approve'])->name('admin.market.comment.approve');
    });
    //delivety group
    Route::prefix('delivery')->group(function () {
      Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
      Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
      Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
      Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
      Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
      Route::delete('/delete/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
      Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.market.delivery.status');
    });
    //off group
    Route::prefix('discount')->group(function () {
      Route::get('/copan', [OffTicketController::class, 'copan'])->name('admin.market.discount.copan');
      Route::get('/copan/create', [OffTicketController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
      Route::post('/copan/store', [OffTicketController::class, 'copanStore'])->name('admin.market.discount.copan.store');
      Route::get('/copan/edit/{copan}', [OffTicketController::class, 'copanEdit'])->name('admin.market.discount.copan.edit');
      Route::put('/copan/update/{copan}', [OffTicketController::class, 'copanUpdate'])->name('admin.market.discount.copan.update');
      Route::delete('/copan/delete/{copan}', [OffTicketController::class, 'copanDestroy'])->name('admin.market.discount.copan.delete');
      Route::get('/common-discount', [OffTicketController::class, 'commonDiscount'])->name('admin.market.discount.common');
      Route::get('/common-discount/create', [OffTicketController::class, 'commonDiscountCreate'])->name('admin.market.common.create');
      Route::post('/common-discount/store', [OffTicketController::class, 'commonDiscountStore'])->name('admin.market.discount.common.store');
      Route::get('/common-discount/edit/{commonDiscount}', [OffTicketController::class, 'commonDiscountEdit'])->name('admin.market.discount.common.edit');
      Route::put('/common-discount/update/{commonDiscount}', [OffTicketController::class, 'commonDiscountUpdate'])->name('admin.market.discount.common.update');
      Route::delete('/common-discount/delete/{commonDiscount}', [OffTicketController::class, 'commonDiscountDestroy'])->name('admin.market.discount.common.delete');
      Route::get('/amazing-sale', [OffTicketController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
      Route::get('/amazing-sale/create', [OffTicketController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
      Route::post('/amazing-sale/store', [OffTicketController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSale.store');
      Route::get('/amazing-sale/edit/{amazingSale}', [OffTicketController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSale.edit');
      Route::put('/amazing-sale/update/{amazingSale}', [OffTicketController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSale.update');
      Route::delete('/amazing-sale/delete/{amazingSale}', [OffTicketController::class, 'amazingSaleDestroy'])->name('admin.market.discount.amazingSale.delete');
    });
    //order group
    Route::prefix('order')->group(function () {
      Route::get('/', [OrderController::class, 'allOrder'])->name('admin.market.order.allOrder');
      Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.new');
      Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
      Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
      Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
      Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
      Route::get('/change-send-status/{order}', [OrderController::class, 'sendStatus'])->name('admin.market.order.sendStatus');
      Route::get('/change-order-status/{order}', [OrderController::class, 'orderStatus'])->name('admin.market.order.orderStatus');
      Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
      Route::get('/show/{order}', [OrderController::class, 'showOrder'])->name('admin.market.order.show');
      Route::get('/details/{order}', [OrderController::class, 'details'])->name('admin.market.order.details');
    });
    //payment group
    Route::prefix('payment')->group(function () {
      Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
      Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
      Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
      Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
      Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
      Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
      Route::get('/cancel/{payment}', [PaymentController::class, 'cancel'])->name('admin.market.payment.cancel');
      Route::get('/return/{payment}', [PaymentController::class, 'return'])->name('admin.market.payment.return');
    });
    //products group
    Route::prefix('product')->group(function () {
      Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
      Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
      Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
      Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
      Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.market.product.update');
      Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');
      Route::get('/delete-meta/{meta}', [ProductController::class, 'deleteMeta'])->name('admin.market.producct.delete-meta');

      //product color
      Route::get('/color/{product}', [ProductColorController::class, 'index'])->name('admin.market.product.color.index');
      Route::get('/color/create/{product}', [ProductColorController::class, 'create'])->name('admin.market.product.color.create');
      Route::post('/color/store/{product}', [ProductColorController::class, 'store'])->name('admin.market.product.color.store');
      Route::get('/color/edit/{color}', [ProductColorController::class, 'edit'])->name('admin.market.product.color.edit');
      Route::put('/color/update/{color}', [ProductColorController::class, 'update'])->name('admin.market.product.color.update');
      Route::delete('/color/delete/{color}', [ProductColorController::class, 'destroy'])->name('admin.market.product.color.destroy');
      
      //product guarantee
      Route::get('/guarantee/{product}', [ProductGuaranteeController::class, 'index'])->name('admin.market.product.guarantee.index');
      Route::get('/guarantee/create/{product}', [ProductGuaranteeController::class, 'create'])->name('admin.market.product.guarantee.create');
      Route::post('/guarantee/store/{product}', [ProductGuaranteeController::class, 'store'])->name('admin.market.product.guarantee.store');
      Route::get('/guarantee/edit/{guarantee}', [ProductGuaranteeController::class, 'edit'])->name('admin.market.product.guarantee.edit');
      Route::put('/guarantee/update/{guarantee}', [ProductGuaranteeController::class, 'update'])->name('admin.market.product.guarantee.update');
      Route::delete('/guarantee/delete/{guarantee}', [ProductGuaranteeController::class, 'destroy'])->name('admin.market.product.guarantee.destroy');
      
      //product gallery
      Route::get('/gallery/{product}', [ProductGalleryController::class, 'index'])->name('admin.market.product.gallery.index');
      Route::get('/gallery/create/{product}', [ProductGalleryController::class, 'create'])->name('admin.market.product.gallery.create');
      Route::post('/gallery/store/{product}', [ProductGalleryController::class, 'store'])->name('admin.market.product.gallery.store');
      Route::get('/gallery/edit/{image}', [ProductGalleryController::class, 'edit'])->name('admin.market.product.gallery.edit');
      Route::put('/gallery/update/{image}', [ProductGalleryController::class, 'update'])->name('admin.market.product.gallery.update');
      Route::delete('/gallery/delete/{image}', [ProductGalleryController::class, 'destroy'])->name('admin.market.product.gallery.destroy');
    });
    //property group
    Route::prefix('property')->group(function () {
      Route::get('/', [PropertyController::class, 'index'])->name('admin.market.property.index');
      Route::get('/create', [PropertyController::class, 'create'])->name('admin.market.property.create');
      Route::post('/store', [PropertyController::class, 'store'])->name('admin.market.property.store');
      Route::get('/edit/{property}', [PropertyController::class, 'edit'])->name('admin.market.property.edit');
      Route::put('/update/{property}', [PropertyController::class, 'update'])->name('admin.market.property.update');
      Route::delete('/delete/{property}', [PropertyController::class, 'destroy'])->name('admin.market.property.destroy');
       //property value
       Route::get('/value/{property}', [PropertyValueController::class, 'index'])->name('admin.market.property.value.index');
       Route::get('/value/create/{property}', [PropertyValueController::class, 'create'])->name('admin.market.property.value.create');
       Route::post('/value/store/{property}', [PropertyValueController::class, 'store'])->name('admin.market.property.value.store');
       Route::get('/value/edit/{property}/{value}', [PropertyValueController::class, 'edit'])->name('admin.market.property.value.edit');
       Route::put('/value/update/{property}/{value}', [PropertyValueController::class, 'update'])->name('admin.market.property.value.update');
       Route::delete('/value/delete/{value}', [PropertyValueController::class, 'destroy'])->name('admin.market.property.value.destroy');
    });
    //store group
    Route::prefix('store')->group(function () {
      Route::get('/', [StoreController::class, 'index'])->name('admin.market.store.index');
      Route::get('/add-to-store/{product}', [StoreController::class, 'addToStore'])->name('admin.market.store.add-to-store');
      Route::post('/store/{product}', [StoreController::class, 'store'])->name('admin.market.store.store');
      Route::get('/edit/{product}', [StoreController::class, 'edit'])->name('admin.market.store.edit');
      Route::put('/update/{product}', [StoreController::class, 'update'])->name('admin.market.store.update');
    });
  });

  // content group
  Route::prefix('content')->namespace('Content')->group(function () {
    // category
    Route::prefix('category')->group(function () {
      Route::get('/', [ContentCategoryController::class, 'index'])->name('admin.content.category.index');
      Route::get('/create', [ContentCategoryController::class, 'create'])->name('admin.content.category.create');
      Route::post('/store', [ContentCategoryController::class, 'store'])->name('admin.content.category.store');
      Route::get('/edit/{postCategory}', [ContentCategoryController::class, 'edit'])->name('admin.content.category.edit');
      Route::put('/update/{postCategory}', [ContentCategoryController::class, 'update'])->name('admin.content.category.update');
      Route::delete('/delete/{postCategory}', [ContentCategoryController::class, 'destroy'])->name('admin.content.category.destroy');
      Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
    });
    // comment group
    Route::prefix('comment')->group(function () {
      Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
      Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
      Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('admin.content.comment.answer');
      Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
      Route::get('/approve/{comment}', [ContentCommentController::class, 'approve'])->name('admin.content.comment.approve');
    });
    // faq group
    Route::prefix('faq')->group(function () {
      Route::get('/', [FAQController::class, 'index'])->name('admin.content.faq.index');
      Route::get('/create', [FAQController::class, 'create'])->name('admin.content.faq.create');
      Route::post('/store', [FAQController::class, 'store'])->name('admin.content.faq.store');
      Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('admin.content.faq.edit');
      Route::put('/update/{faq}', [FAQController::class, 'update'])->name('admin.content.faq.update');
      Route::delete('/delete/{faq}', [FAQController::class, 'destroy'])->name('admin.content.faq.destroy');
      Route::get('/status/{faq}', [FAQController::class, 'status'])->name('admin.content.faq.status');
    });
    // menu group
    Route::prefix('menu')->group(function () {
      Route::get('/', [MenuController::class, 'index'])->name('admin.content.menu.index');
      Route::get('/create', [MenuController::class, 'create'])->name('admin.content.menu.create');
      Route::post('/store', [MenuController::class, 'store'])->name('admin.content.menu.store');
      Route::get('/edit/{menu}', [MenuController::class, 'edit'])->name('admin.content.menu.edit');
      Route::put('/update/{menu}', [MenuController::class, 'update'])->name('admin.content.menu.update');
      Route::delete('/delete/{menu}', [MenuController::class, 'destroy'])->name('admin.content.menu.destroy');
      Route::get('/status/{menu}', [MenuController::class, 'status'])->name('admin.content.menu.status');
    });
    // page group
    Route::prefix('page')->group(function () {
      Route::get('/', [PageController::class, 'index'])->name('admin.content.page.index');
      Route::get('/create', [PageController::class, 'create'])->name('admin.content.page.create');
      Route::post('/store', [PageController::class, 'store'])->name('admin.content.page.store');
      Route::get('/edit/{page}', [PageController::class, 'edit'])->name('admin.content.page.edit');
      Route::put('/update/{page}', [PageController::class, 'update'])->name('admin.content.page.update');
      Route::delete('/delete/{page}', [PageController::class, 'destroy'])->name('admin.content.page.destroy');
      Route::get('/status/{page}', [PageController::class, 'status'])->name('admin.content.page.status');
    });
    // post group
    Route::prefix('post')->group(function () {
      Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
      Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
      Route::post('/store', [PostController::class, 'store'])->name('admin.content.post.store');
      Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.content.post.edit');
      Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.content.post.update');
      Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('admin.content.post.destroy');
      Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
      Route::get('/commentable/{post}', [PostController::class, 'commentable'])->name('admin.content.post.commentable');
    });
    // banners group
    Route::prefix('banner')->group(function () {
      Route::get('/', [BannerController::class, 'index'])->name('admin.content.banner.index');
      Route::get('/create', [BannerController::class, 'create'])->name('admin.content.banner.create');
      Route::post('/store', [BannerController::class, 'store'])->name('admin.content.banner.store');
      Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.content.banner.edit');
      Route::put('/update/{banner}', [BannerController::class, 'update'])->name('admin.content.banner.update');
      Route::delete('/delete/{banner}', [BannerController::class, 'destroy'])->name('admin.content.banner.destroy');
      Route::get('/status/{banner}', [BannerController::class, 'status'])->name('admin.content.banner.status');
    });
  });

  // user group
  Route::prefix('user')->namespace('User')->group(function () {
    // admin-user group
    Route::prefix('admin-user')->group(function () {
      Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
      Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
      Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
      Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
      Route::put('/update/{user}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
      Route::delete('/delete/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
      Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
      Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
    });
    // customer group
    Route::prefix('customer')->group(function () {
      Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
      Route::get('/create', [CustomerController::class, 'create'])->name('admin.user.customer.create');
      Route::post('/store', [CustomerController::class, 'store'])->name('admin.user.customer.store');
      Route::get('/edit/{user}', [CustomerController::class, 'edit'])->name('admin.user.customer.edit');
      Route::put('/update/{user}', [CustomerController::class, 'update'])->name('admin.user.customer.update');
      Route::delete('/delete/{user}', [CustomerController::class, 'destroy'])->name('admin.user.customer.destroy');
      Route::get('/status/{user}', [CustomerController::class, 'status'])->name('admin.user.customer.status');
      Route::get('/activation/{user}', [CustomerController::class, 'activation'])->name('admin.user.customer.activation');
    });
    // role group
    Route::prefix('role')->group(function () {
      Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
      Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
      Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
      Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
      Route::get('/edit-permissions/{role}', [RoleController::class, 'editPermissions'])->name('admin.user.role.edit-permissions');
      Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
      Route::put('/update-permissions/{role}', [RoleController::class, 'updatePermissions'])->name('admin.user.role.update-permissions');
      Route::delete('/delete/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
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
      Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
      Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
      Route::delete('/delete/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
      Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
    });
    // email files group
    Route::prefix('email-files')->group(function () {
      Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-files.index');
      Route::get('/create/{email}', [EmailFileController::class, 'create'])->name('admin.notify.email-files.create');
      Route::post('/store/{email}', [EmailFileController::class, 'store'])->name('admin.notify.email-files.store');
      Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-files.edit');
      Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-files.update');
      Route::delete('/delete/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-files.destroy');
      Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-files.status');
    });
    // sms group
    Route::prefix('sms')->group(function () {
      Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
      Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
      Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
      Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
      Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
      Route::delete('/delete/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
      Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
    });
  });

  // tickets group
  Route::prefix('ticket')->namespace('Ticket')->group(function () {
    Route::get('/new-ticket', [TicketController::class, 'newTicket'])->name('admin.ticket.new-ticket');
    Route::get('/open-ticket', [TicketController::class, 'openTicket'])->name('admin.ticket.open-ticket');
    Route::get('/close-ticket', [TicketController::class, 'closeTicket'])->name('admin.ticket.close-ticket');
    Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
    Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
    Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
    // category tickets group
    Route::prefix('category')->group(function () {
      Route::get('/', [CategoryTicketController::class, 'index'])->name('admin.ticket.category.index');
      Route::get('/create', [CategoryTicketController::class, 'create'])->name('admin.ticket.category.create');
      Route::post('/store', [CategoryTicketController::class, 'store'])->name('admin.ticket.category.store');
      Route::get('/edit/{categoryTicket}', [CategoryTicketController::class, 'edit'])->name('admin.ticket.category.edit');
      Route::put('/update/{categoryTicket}', [CategoryTicketController::class, 'update'])->name('admin.ticket.category.update');
      Route::delete('/delete/{categoryTicket}', [CategoryTicketController::class, 'destroy'])->name('admin.ticket.category.destroy');
      Route::get('/status/{categoryTicket}', [CategoryTicketController::class, 'status'])->name('admin.ticket.category.status');
    });
    // priority tickets group
    Route::prefix('priority')->group(function () {
      Route::get('/', [PriorityTicketController::class, 'index'])->name('admin.ticket.priority.index');
      Route::get('/create', [PriorityTicketController::class, 'create'])->name('admin.ticket.priority.create');
      Route::post('/store', [PriorityTicketController::class, 'store'])->name('admin.ticket.priority.store');
      Route::get('/edit/{ticketPeriority}', [PriorityTicketController::class, 'edit'])->name('admin.ticket.priority.edit');
      Route::put('/update/{ticketPeriority}', [PriorityTicketController::class, 'update'])->name('admin.ticket.priority.update');
      Route::delete('/delete/{ticketPeriority}', [PriorityTicketController::class, 'destroy'])->name('admin.ticket.priority.destroy');
      Route::get('/status/{ticketPeriority}', [PriorityTicketController::class, 'status'])->name('admin.ticket.priority.status');
    });
    // admin tickets group
    Route::prefix('admin')->group(function () {
      Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
      Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
    });
  });

  // setting group
  Route::prefix('setting')->namespace('Setting')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
  });
});

// notifications group
Route::prefix('notification')->namespace('Notification')->group(function () {
  Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
  Route::post('/read-all', [NotificationController::class, 'readAll'])->name('notification.read-all');
});

// customer group
Route::namespace('Customer')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('customer.index');
  Route::get('/home', [HomeController::class, 'index'])->name('customer.home');
});

// login register routes
Route::namespace('Auth')->group(function () {
  Route::get('/login-register-form', [LoginRegisterController::class, 'LoginRegisterForm'])->name('customer.auth.login-register-form');
  Route::middleware('throttle:customer-login-register-limit')->post('/login-register', [LoginRegisterController::class, 'LoginRegister'])->name('customer.auth.login-register');
  Route::get('/login-confirm-form/{token}', [LoginRegisterController::class, 'loginConfirmForm'])->name('customer.auth.login-confirm-form');
  Route::middleware('throttle:customer-send-token-limit')->post('/login-confirm/{token}', [LoginRegisterController::class, 'loginConfirm'])->name('customer.auth.login-confirm');
  Route::middleware('throttle:customer-resend-token-limit')->get('/login-resend-otp/{token}', [LoginRegisterController::class, 'loginResendOtp'])->name('customer.auth.login-resend-otp');
  Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('customer.auth.logout');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
