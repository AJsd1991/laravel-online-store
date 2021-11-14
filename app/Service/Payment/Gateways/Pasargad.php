<?php

namespace App\Service\Payment\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;

class Pasargad implements GatewayInterface
{
    public function pay(Order $order, int $amount)
    {
        dd('pasargad pay');
    }


    public function verify(Request $request)
    {
        //
    }

    public function getName(): string
    {
        return 'pasargad';
    }
}
