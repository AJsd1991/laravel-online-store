<?php

namespace App\Service\Cost;

use App\Service\Cost\Contracts\CostInterface;

class ShippingCost implements CostInterface
{
    /**
     * @var cost
     */
    private $cost;
    const SHIPPING_COST = 30;

    public function __construct(CostInterface $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return self::SHIPPING_COST;
    }

    public function getTotalCosts()
    {
        return $this->cost->getTotalCosts() + $this->getCost();
    }

    public function description()
    {
        return 'Shipping';
    }

    public function getSummary()
    {
        return array_merge($this->cost->getSummary(),[$this->description() => $this->getCost()]);
    }
}