<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreController;
use App\Models\Coupon;
use App\Service\Storage\Contracts\StorageInterface;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// landing page
Route::get('/', App\Http\Controllers\HomeController::class)
    ->name('home.landing');
    
// products
Route::get('/products', [StoreController::class, 'index'])
->name('store.index');
Route::get('/product/{product}', [StoreController::class, 'show'])
->name('store.show');

// dashboard
Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard',
], function () {

    Route::view('/', 'users.dashboard')->name('dashboard');
    Route::resource('/my-orders', App\Http\Controllers\User\OrderController::class)
    ->only('index', 'show');

    // Route::resource('posts', App\Http\Controllers\PostController::class)
    // ->except('show');

});

require __DIR__.'/auth.php';

// Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// cart
Route::get('cart/add/{product}', [CartController::class, 'add'])
->name('cart.add');
Route::get('cart', [CartController::class, 'index'])
->name('cart.index');
Route::post('cart/delete/{product}', [CartController::class, 'destroy'])
->name('cart.destroy');
Route::post('cart/update/{product}', [CartController::class, 'update'])
->name('cart.update');
Route::get('cart/checkout', [CartController::class, 'checkoutForm'])
->name('cart.checkout.form');
Route::post('cart/checkout', [CartController::class, 'checkout'])
->name('cart.checkout');

// payment
Route::post('payment/{gateway}/callback', [PaymentController::class, 'verify'])
->name('payment.verify');

// coupon
Route::post('coupon', [CouponController::class, 'store'])
->name('coupons.store');
Route::get('coupon', [CouponController::class, 'remove'])
->name('coupons.remove');

// search
Route::get('search', App\Http\Controllers\SearchController::class)
->name('search');

// test
Route::get('test', function(){
    return hash_equals(session()->token(), '3QmZFztS0MMiSYCu1q2glRy4THnFm5cNQq0ob34w');
    session()->all();
    session()->forget('coupon');
    return back();
    $sessionStorage = resolve(StorageInterface::class);
    $sessionStorage->set('product', 8);
    $sessionStorage->set('price', 2500);
    $sessionStorage->set('status', 'pending');
    // $sessionStorage->clear();
    dump($sessionStorage->count());
    // dd($sessionStorage->all());

});
