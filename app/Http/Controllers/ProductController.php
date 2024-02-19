<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Eliminar Producto!';
        $text = "¿Estas seguro que deseas eliminar este producto?";
        confirmDelete($title, $text);

       return view('products');
        
    }

    public function getAll(){
        try {
            $products = Product::all();
            return response()->json(['code' => 200, 'products' => $products ]);
        }catch (Exception $e){
            return response()->json([ 'code' => 500, 'menssage' => $e->getMessage() ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('formproduct');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $request->validate([ 
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'category' => 'required',
            'stock' => 'required|numeric',
        ]);

        $result = Product::saveProduct($request);

        if($result){
            return redirect('products')->with('status', '200')
                                ->with('message', 'Producto Agregado Satisfactoriamente');
        }else {
            return redirect('products')->with('status', '500')
                                ->with('message', 'Ups, Hubo un error al agregar el Producto');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        if($product){
            return view('formproduct',compact('product'));
        }else {
            return redirect('products')->with('status', '500')
                                ->with('message', 'Ups, Hubo un error al editar');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        //
        $request->validate([ 
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'category' => 'required',
            'stock' => 'required|numeric',
        ]);

        $result = Product::updateProduct($request, $id);

        if($result){
            return redirect('products')->with('status', '200')
                                ->with('message', 'Producto actualizado satisfactoriamente');
        }else {
            return redirect('products')->with('status', '500')
                                ->with('message', 'Ups, Hubo un error al actualizar el producto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $result = Product::find($id)->delete();
        
        if($result){
            return redirect('products')->with('status', '200')
                                ->with('message', 'Producto eliminado satisfactoriamente');
        }else {
            return redirect('products')->with('status', '500')
                                ->with('message', 'Ups, Hubo un error al eliminar el producto');
        }
    }
}
