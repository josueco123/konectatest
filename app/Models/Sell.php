<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function saveSell($request){

        $this->product_id = $request->product_id;
        $this->amount = $request->amount;

        if($this->save()){
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
