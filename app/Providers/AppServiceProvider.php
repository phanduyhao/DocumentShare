<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Favourite;
use App\Models\Menu;
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
        View::composer('layout.header', function ($view) {
            $menus = Menu::all();
            $view->with('menus', $menus);
        });
        View::composer('layout.list_cates', function ($view) {
            $cates = Category::all();
            $view->with('cates', $cates);
        });
    }
}
