<?php

namespace App\Service\Payment;

use App\Models\Order;
use App\Models\Payment;
use App\Service\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Transaction
{
    private $request;
    private $cart;

    public function __construct(Request $request, Cart $cart)
    {
        $this->request = $request;
        $this->cart = $cart;
    }

    public function checkout()
    {
        $order = $this->makeOrder();

        $this->makePayment($order);

        $this->cart->clear();

        return $order;
    }

    private function makeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'code' => bin2hex(Str::random(16)),
            'amount' => $this->cart->subTotal(),
        ]);

        $order->products()->sync($this->products());

        return $order;
    }

    private function makePayment($order)
    {
        $order = Payment::create([
            'order_id' => $order->id,
            'method' => $this->request->method,
            'amount' => $order->amount,
        ]);
        
    }

    private function products()
    {
        foreach ($this->cart->all() as $product) {
            $products[$product->id] = [
                'quantity' => $product->quantity
            ];
        }

        return $products;
    }
}
