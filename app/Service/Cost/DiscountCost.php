<?php

namespace App\Service\Cost;

use App\Service\Cost\Contracts\CostInterface;
use App\Service\Discount\DiscountManager;

class DiscountCost implements CostInterface
{
    private $cost;
    private $discountManager;

    public function __construct(CostInterface $cost, DiscountManager $discountManager)
    {
       $this->cost = $cost; 
       $this->discountManager = $discountManager;
    }

    public function getCost()
    {
        return $this->discountManager->calculateUserDiscount();
    }

    public function getTotalCosts()
    {
        return $this->cost->getTotalCosts() - $this->getCost();
    }

    public function description()
    {
        return 'Discount';  
    }

    public function getSummary()
    {
        return array_merge($this->cost->getSummary(),[$this->description() => $this->getCost()]);
    }
}