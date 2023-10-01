<?php

namespace App\ValueObjects;

class PriceValueObject
{
    protected readonly float $price;

    public function __construct(float $value)
    {
        $this->price = $value;
    }

    public function getPriceWithCurrency()
    {
        return $this->price.' EGP';
    }

    public static function getCurrentCurrency()
    {
        return 'EGP';
    }
}
