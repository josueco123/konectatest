<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $product = new Product();
        $product->name = 'Pandebono';
        $product->reference = 'PDN-21';
        $product->price = 1000;
        $product->weight = 12;
        $product->category = 'Panaderia';
        $product->stock = 10;
        $product->save();

        $product = new Product();
        $product->name = 'Pan queso';
        $product->reference = 'PQ-22';
        $product->price = 1500;
        $product->weight = 21;
        $product->category = 'Panaderia';
        $product->stock = 15;
        $product->save();


        $product = new Product();
        $product->name = 'Almojabana';
        $product->reference = 'ALJ-23';
        $product->price = 1000;
        $product->weight = 10;
        $product->category = 'Panaderia';
        $product->stock = 8;
        $product->save();
    }
}
