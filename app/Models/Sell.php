<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sell extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function getSellProducts(){
        $sells = Sell::select('products.name',  DB::raw("SUM(sells.amount) AS total_sells"))
                    ->join('products', 'products.id', '=', 'sells.product_id')
                    ->groupBy('products.name')
                    ->get();

        return $sells;
    }

    public static function getProductsWithMoreSells(){
        $sell = Sell::select('products.name', DB::raw("SUM(sells.amount) AS total_sells"))
                    ->join('products', 'products.id', '=', 'sells.product_id')
                    ->groupBy('products.name')
                    ->orderBy('total_sells', 'desc')
                    ->first();

        return $sell;
    }

    public static function saveSell($request){
        $sell = new Sell();
        $sell->product_id = $request->product_id;
        $sell->amount = $request->amount;

        if($sell->save()){
            return true;
        }else {
            return false;
        }

    }

    public function updateProduct($request, $id){

        $sell = Sells::find($id);
        $sell->product_id = $request->product_id;
        $sell->amount = $request->amount;

        if($sell->save()){
            return true;
        }else {
            return false;
        }

    }
}
