<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currencyCode = $request->get('currency', 'UZS'); // Default currency is UZS

        $products = Product::all()->map(function ($product) use ($currencyCode) {
            try {
                $product->converted_price = $product->convertPrice($currencyCode);
                $product->currency = $currencyCode;
            } catch (\Exception $e) {
                $product->converted_price = null;
                $product->currency = "Invalid currency";
            }
            return $product;
        });

        return response()->json($products);
    }

    function convertCurrency($amount, $fromRate, $toRate)
    {
        return ($amount / $fromRate) * $toRate;
    }
}
