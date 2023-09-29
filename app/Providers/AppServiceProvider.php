<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.main', function ($view) {
            $user = Auth::user();
            $name = $user->name;
            $role = $user->role;

            $view->with('name', $name)->with('role', $role);
        });
    }
}
