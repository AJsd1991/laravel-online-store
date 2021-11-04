<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Payment\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->where('user_id', auth()->id())->paginate(4);
        
        return view('users.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderItems = $order->products;

        return view('users.orders.show', compact('order', 'orderItems'));
    }

    public function completePayment($id)
    {
        $order = Order::find($id);

        return $this->transaction->completePayment($order);
    }

}
