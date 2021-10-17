<?php

namespace App\Providers;

use App\Models\Category;
use App\Service\Storage\Contracts\StorageInterface;
use App\Service\Storage\SessionStorage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

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
        Voyager::useModel('Category', \App\Models\Category::class);

        $this->app->bind(StorageInterface::class, function($app){
            return new SessionStorage('cart');
        });

        $categories = Category::all();
        View::share('categories', $categories);
    }
}
