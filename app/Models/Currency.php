<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'rate'];

    public static function convert($amount, $toCurrency)
    {
        $currency = self::where('code', $toCurrency)->first();
        if (!$currency) {
            throw new \Exception("Currency not found");
        }
        return $amount * $currency->rate;
    }
}
