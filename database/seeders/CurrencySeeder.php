<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['code' => 'USD', 'rate' => 1.0000], // Base currency
            ['code' => 'UZS', 'rate' => 12000.0000], // Example rate
            ['code' => 'RUB', 'rate' => 96.0000],
        ]);

    }
}
