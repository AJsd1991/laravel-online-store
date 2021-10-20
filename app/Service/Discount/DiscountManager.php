<?php

namespace App\Service\Discount;

use App\Service\Cost\CartCost;
use App\Service\Discount\DiscountCalculator;

class DiscountManager
{
    private $cartCost;
    private $discounCalculator;

    public function __construct(CartCost $cartCost, DiscountCalculator $discounCalculator)
    {
       $this->cartCost = $cartCost;
       $this->discounCalculator = $discounCalculator;
    }

    public function calculateUserDiscount()
    {
        if (!session()->has('coupon')) return 0;

        return $this->discounCalculator->discountAmount(session()->get('coupon'), $this->cartCost->getTotalCosts());
    }
}