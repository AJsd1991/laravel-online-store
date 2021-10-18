<?php

namespace App\Http\Controllers;

use App\Service\Payment\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }



    public function verify(Request $request)
    {
        return  $this->transaction->verify()
            ? $this->sendSuccessResponse()
            : $this->sendErrorResponse();
    }

    private function sendErrorResponse()
    {
        return redirect()->route('cart.index')->with('error', 'There is an error for registering order!');
    }

    private function sendSuccessResponse()
    {
        return redirect()->route('cart.index')->with('success', 'Your order registered successfully!');
    }
}
