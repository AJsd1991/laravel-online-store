<?php

namespace App\Service\Cost\Contracts;

interface CostInterface
{
    public function getCost();
    public function getTotalCosts();
    public function description();
    public function getSummary();
}