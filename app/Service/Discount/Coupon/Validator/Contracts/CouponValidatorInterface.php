<?php

namespace App\Service\Discount\Coupon\Validator\Contracts;

use App\Models\Coupon;

// Contract for classes that should validate the coupon
interface CouponValidatorInterface
{
    // Determine naxt class for validation
    public function setNextValidator(CouponValidatorInterface $validator);

    // Implement logic for validation
    public function validate(Coupon $coupon);
}