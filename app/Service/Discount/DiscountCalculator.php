<?php

namespace App\Service\Discount;

use App\Models\Coupon;

class DiscountCalculator
{
    public function discountAmount(Coupon $coupon, int $amount)
    {
        $discountAmount = ($coupon->percent / 100) * $amount;

        return $this->isExceeded($coupon->limit, $discountAmount) ? $coupon->limit : $discountAmount;
    }

    public function discountedPrice(Coupon $coupon, int $amount)
    {
        return $amount - $this->discountAmount($coupon, $amount);   
    }

    public function isExceeded(int $limit, int $amount)
    {
        return $amount > $limit;
    }
}