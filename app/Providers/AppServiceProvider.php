<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->composer(['*'], function ($view) {
            $pendingdatas = Order::where('status','=','PENDING')->count();
            $view->with(compact('pendingdatas'));
        });
    }
}
