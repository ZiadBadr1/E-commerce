<?php

namespace App\ValueObjects;

use App\Enums\Currency;

class PriceValueObject
{
    protected readonly float $price;

    public function __construct(float $value)
    {
        $this->price = $value;
    }

    public function getPriceWithCurrency()
    {
        return $this->price.' '.Currency::EGYPTIAN->value;
    }

    public static function getCurrentCurrency()
    {
        return Currency::EGYPTIAN->value;
    }

    public function getPriceByCents()
    {
        return $this->price * 100;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceAfterDiscount(float $discountPrecentage)
    {
        $priceByCents = $this->price * 100;

        $priceAfterDiscountByCents = $priceByCents - ($priceByCents * ($discountPrecentage / 100));

        return $priceAfterDiscountByCents / 100;
    }

    public function getPriceAfterDiscountWithCurrency(float $discountPrecentage)
    {
        $price = $this->getPriceAfterDiscount($discountPrecentage);

        return $price.' '.Currency::EGYPTIAN->value;
    }
}
