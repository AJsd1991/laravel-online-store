<?php

namespace App\Providers;

use App\Models\Category;
use App\Service\Cart\Cart;
use App\Service\Cost\CartCost;
use App\Service\Cost\ShippingCost;
use App\Service\Cost\Contracts\CostInterface;
use App\Service\Cost\DiscountCost;
use App\Service\Discount\DiscountManager;
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

        $this->app->bind(CostInterface::class, function($app){
            $cartCast = new CartCost($app->make(Cart::class));
            $shippingCast = new ShippingCost($cartCast);
            $discountCast = new DiscountCost($shippingCast, $app->make(DiscountManager::class));

            return $discountCast;
        });

        $categories = Category::with('children')->where('parent_id', null)->get();
        View::share('categories', $categories);
    }
}
