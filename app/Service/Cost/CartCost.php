<?php

namespace App\Service\Cost;

use App\Service\Cart\Cart;
use App\Service\Cost\Contracts\CostInterface;

class CartCost implements CostInterface
{
    /**
     * @var cart
     */
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCost()
    {
        return $this->cart->subTotal();
    }

    public function getTotalCosts()
    {
        return $this->getCost();
    }

    public function description()
    {
        return 'Subtotal';
    }

    public function getSummary()
    {
        return [$this->description() => $this->getCost()];
    }
}