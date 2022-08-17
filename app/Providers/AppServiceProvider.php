<?php

namespace App\Providers;

use App\Models\Notification;
use Facade\FlareClient\View;
use App\Models\Content\Comment;
use App\Models\Market\CartItem;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.header', function ($view) {
            $unseenComments= Comment::where('seen', 0)->orderBy('created_at', 'desc')->get();
            $unseenNotify= Notification::where('read_at', null)->orderBy('created_at', 'desc')->get();
            $view->with('unseenComments', $unseenComments);
        });
        view()->composer('admin.layouts.header', function ($view) {
            $unseenNotify= Notification::where('read_at', null)->orderBy('created_at', 'desc')->get();
            $view->with('unseenNotify', $unseenNotify);
        });

        view()->composer('customer.layouts.top-header', function($view){
            if(Auth::check()){
                $user= Auth::user();
                $cartItems= CartItem::where('user_id', $user->id)->get();
                $view->with('cartItems', $cartItems);
            }
        });
    }
}
