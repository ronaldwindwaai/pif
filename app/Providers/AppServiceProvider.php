<?php

namespace App\Providers;

use App\Http\Resources\CalendarResource;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        CalendarResource::withoutWrapping();

       //dd(Auth::user()->unreadNotifications);
        view()->composer('shared.header', function ($view) {
            $view->with('notifications', Auth::user()->unreadNotifications);
        });
    }
}
