<?php

namespace App\Service\Discount\Coupon;

use App\Models\Coupon;
use App\Service\Discount\Coupon\Validator\CanUseIt;
use App\Service\Discount\Coupon\Validator\IsExpired;

class CouponValidator
{
    public function isValid(Coupon $coupon)
    {
        $isExpired = resolve(IsExpired::class);
        $canUseIt = resolve(CanUseIt::class);
        
        $isExpired->setNextValidator($canUseIt);    

        return $isExpired->validate($coupon);
    }
}