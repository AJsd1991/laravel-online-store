<?php

namespace App\Service\Discount\Coupon\Validator;

use App\Exceptions\CouponHasExpiredException;
use App\Service\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;

class IsExpired extends AbstractCouponValidator
{
    public function validate($coupon)
    {
        if ($coupon->isExpired()) {
            throw new CouponHasExpiredException();
        }

        return parent::validate($coupon);
    }
}