<?php

namespace App\Providers;

use App\Models\Content\Comment;
use App\Models\Notification;
use Facade\FlareClient\View;
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
    }
}
