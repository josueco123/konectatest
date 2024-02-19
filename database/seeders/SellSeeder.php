<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sell;

class SellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sell = new Sell();
        $sell->product_id = 1;
        $sell->amount = 3;
        $sell->save();

        $sell = new Sell();
        $sell->product_id = 2;
        $sell->amount = 2;
        $sell->save();

        $sell = new Sell();
        $sell->product_id = 3;
        $sell->amount = 5;
        $sell->save();
    }
}
