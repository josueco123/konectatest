<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;
use App\Models\Product;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $sells = Sell::getSellProducts();
            return response()->json(['code' => 200, 'sells' => $sells ]);
        }catch (Exception $e){
            return response()->json([ 'code' => 500, 'menssage' => $e->getMessage() ]);
        }
        
    }

    public function dashboard()
    {
        try{
            $sellsproduct = Sell::getProductsWithMoreSells();
            $productstorck = Product::getProductWithMoreStock();
            return view('home',compact('sellsproduct','productstorck'));

        }catch (Exception $e){
            return view('home')->with('status', '500')
            ->with('message', 'Ups, Hubo un error '. $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function updateStockProduct($request){

        $product = Product::find($request->product_id);
        $stock = $product->stock - $request->amount;
        if($stock < 0){
            return false;
        } else {
            Product::updateProductStock($stock, $request->product_id);
            return true;
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellRequest $request)
    {
        //
        $request->validate([ 
            'product_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);
        
        try {
            
            $resutl = $this->updateStockProduct($request);

            if($resutl){
                Sell::saveSell($request);  
                return redirect('products')->with('status', '200')
                ->with('message', 'Venta realizada con exito');
            } else{
                return redirect('products')->with('status', '401')
                ->with('message', 'VENTA NO REALIZADA la cantidad de productos es incorrecta');
            }
            
        }catch (Exception $e){
            return redirect('products')->with('status', '500')
                                ->with('message', 'Ups, Hubo un error '. $e->getMessage());
           
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellRequest $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sell $sell)
    {
        //
    }
}
