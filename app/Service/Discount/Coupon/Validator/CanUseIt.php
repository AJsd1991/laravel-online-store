<?php

namespace App\Service\Discount\Coupon\Validator;

use App\Exceptions\IllegalCouponException;
use App\Models\Coupon;
use App\Service\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;

class CanUseIt extends AbstractCouponValidator
{
    public function validate(Coupon $coupon)
    {
        if (!auth()->user()->coupons->contains($coupon)) {
            throw new IllegalCouponException();
        }

        return parent::validate($coupon);
    }
}