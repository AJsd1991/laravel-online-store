<?php

namespace App\Service\Payment;

use App\Models\Order;
use App\Models\Payment;
use App\Service\Cart\Cart;
use App\Service\Payment\Gateways\GatewayInterface;
use App\Service\Payment\Gateways\Pasargad;
use App\Service\Payment\Gateways\Saman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();

        $order = $this->makeOrder();

        $payment = $this->makePayment($order);

        DB::commit();

        if ($payment->isONline()) {
            return $this->gatewayFactory()->pay($order);
        }

        $this->normalizeQuantity($order);

        $this->cart->clear();
        
        return $order;
    }

    public function verify()
    {
        $result = $this->gatewayFactory()->verify($this->request);

        if ($result['status'] === GatewayInterface::TRANSACTION_FAILED) return false;

        $this->confirmPayment($result);

        $this->normalizeQuantity($result['order']);

        return true;
    }

    private function confirmPayment($result)
    {
        return $result['order']->payment->confirm($result['refNum'], $result['gateway']);
    }

    private function gatewayFactory()
    {
        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class
        ][$this->request->gateway];

        return resolve($gateway);
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
        $payment = Payment::create([
            'order_id' => $order->id,
            'method' => $this->request->method,
            'amount' => $order->amount,
        ]);

        return $payment;        
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

    private function normalizeQuantity($order)
    {
        foreach ($order->products as $product) {
            $product->decrementStock($product->pivot->quantity);
        }
    }
}
