<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $menu = ['Home', 'About', 'Contact']; // Example menu data
        view::share('menu', $menu);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from menu.json file
        $menuJson = file_get_contents(base_path('public/data/menu.json'));
        $verticalMenuData = json_decode($menuJson);
        // share all menuData to all the views
        View::share('menuData', $verticalMenuData);
    }
}
