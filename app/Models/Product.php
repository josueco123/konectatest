<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function sells(): HasMany
    {
        return $this->hasMany(Sell::class);
    }

    public function getProducts(){

    }

    public static function saveProduct($request){
        $product = new Product();
        $product->name = $request->name;
        $product->reference = $request->reference;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->category = $request->category;
        $product->stock = $request->stock;

        if($product->save()){
            return true;
        }else {
            return false;
        }

    }

    public static function updateProduct($request, $id){

        $product = Product::find($id);
        $product->name = $request->name;
        $product->reference = $request->reference;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->category = $request->category;
        $product->stock = $request->stock;

        if($product->save()){
            return true;
        }else {
            return false;
        }

    }
}
