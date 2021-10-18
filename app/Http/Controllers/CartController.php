<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Service\Cart\Cart;
use App\Service\Payment\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;
    private $transaction;

    public function __construct(Cart $cart, Transaction $transaction)
    {
        $this->middleware('auth')->only(['checkoutForm', 'checkout']);
        $this->cart = $cart;
        $this->transaction = $transaction;
    }

    public function index()
    {
        $items = $this->cart->all();
        
        return view('cart.cart')->with([  
            'items' => $items,  
        ]);
    }

    public function add(Product $product)
    {
        try{

            $this->cart->add($product, 1);

            return back()->with('success', 'Product added to cart successfully!');

        }catch(QuantityExceededException $e){

            return back()->with('error', 'Stock is finished!');
        }
       
    }

    public function destroy(Product $product)
    {
        $this->cart->delete($product->id);  
        
        return back();     
    }

    public function update(Request $request, Product $product)
    {
        try {
            $this->cart->update($product, $request->quantity);
            return back(); 
        }catch(QuantityExceededException $e){

            return back()->with('error', 'Stock is finished!');
        }   
    }

    public function checkoutForm()
    {

        return view('cart.checkout');
    }

    public function checkout(Request $request)
    {
        $this->validateForm($request);

        $order = $this->transaction->checkout();
        
        return redirect()
            ->route('cart.index')
            ->with('success', "Your order has been registered with order number : $order->id");
    }

    public function validateForm($request)
    {
        $request->validate([
            'method' => ['required'],
            'gateway' => ['required_if:method,online']
        ]);
    }

}
