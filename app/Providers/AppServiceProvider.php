<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(255); // Mặc định độ dài của chuỗi là 255 ký tự
        Paginator::useBootstrap();
        $wCount = Wishlist::count();
        view()->share('wCount', $wCount);
    }
}
