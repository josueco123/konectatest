@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach 
            </div>
            @endif  
            <div class="card">
                <div class="card-header"><?= isset($product) ? 'Actualizar Producto': 'Agregar Producto' ?></div>
                @if (isset($product))
                <form method="POST" class="mt-2" action="{{ route('updateproduct',['id' => $product->id]) }}">
                @else
                <form method="POST" class="mt-2" action="{{ route('saveproduct') }}">
                @endif  
                    @csrf  
                    <div class="row g-3 m-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" id="name" name="name" value="<?= isset($product) ? $product->name : '' ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Referencia" aria-label="Referencia" id="reference" name="reference" value="<?= isset($product) ? $product->reference : '' ?>">
                        </div>
                    </div>
                    <div class="row g-3 m-2">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Precio" aria-label="Precio" id="price" name="price" value="<?= isset($product) ? $product->price : '' ?>">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Peso" aria-label="Peso" id="weight" name="weight" value="<?= isset($product) ? $product->weight : '' ?>">
                        </div>
                    </div>
                    <div class="row g-3 m-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Categoria" aria-label="Precio" id="category" name="category" value="<?= isset($product) ? $product->category : '' ?>">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Stock" aria-label="Stock" id="stock" name="stock" value="<?= isset($product) ? $product->stock : '' ?>">
                        </div>
                    </div>
                    
                    <div class="row g-3 m-2">
                        <div class="col">
                            <button type="submit" class="btn btn-primary"><?= isset($product) ? "Actualizar": "Guardar" ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection