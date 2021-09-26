<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LandingPageController::class, 'index'])
    ->name('landing-page');
    
// products
Route::get('/products', [StoreController::class, 'index'])
->name('store');
Route::get('/product/{product}', [StoreController::class, 'show'])
->name('store.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
