<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::inRandomOrder()->take(5)->get();
        $categories = Category::all();
        $slides = Slide::query()->where('status', true)->get();

        return view('home.landing')->with([
            'products' => $products,
            'categories' => $categories,
            'slides' => $slides,
        ]);
    }
}
