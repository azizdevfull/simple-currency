<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function convertPrice($currencyCode)
    {
        $currency = Currency::where('code', $currencyCode)->first();

        if (!$currency) {
            throw new \Exception("Currency not found.");
        }

        return round($this->price / $currency->rate, 2); // Conversion
    }
}
