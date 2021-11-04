<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use App\Service\Cart\Cart;
use App\Service\Storage\Contracts\StorageInterface;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        

        if (request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            })->paginate(12);

            $categoryName = Category::query()->where('slug', request()->category)->first()->name;


        } else {
            // show all products
            $products = Product::latest()->paginate(12);
            $categoryName = 'All Products';
        }

        return view('products.index')->with([
            'products' => $products,
            'categoryName' => $categoryName,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // show one product
        $product = Product::where('slug', $slug)->firstOrFail();
        // show all categories
        $categories = Category::all();

        

        $moreProducts = Product::where('slug', '!=' , $slug)->inRandomOrder()->take(4)->get();

        return view('products.show')->with([
            'product' => $product,
            'moreProducts' => $moreProducts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
