<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Service\Discount\Coupon\CouponValidator;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $validator;

    public function __construct(CouponValidator $validator)
    {
        $this->middleware('auth');
        $this->validator = $validator;
    }
    public function store(Request $request)
    { 

        $request->validate([
            'code' => 'required|exists:coupons,code',
        ]);  

        try {

            $coupon = Coupon::query()->where('code', $request->code)->firstOrFail();

            // can use it user (design patern: chain of responsibility)
            $this->validator->isValid($coupon);


            session()->put(['coupon' => $coupon]);

            return back()->withSuccess("Coupon Applied Successfully!");

        } catch (\Exception $e) {
            return back()->withError("Coupon is Invalid!");
        }
    }

    public function remove()
    {
        session()->forget('coupon');

        return back();
    }

}
