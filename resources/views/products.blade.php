@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2 mt-2">
        <a class='btn btn-primary me-2' href="{{ route('saveproduct') }}" role='button'> Agregar Producto </a>
        <button type="button" class='btn btn-success evt-modal' data-bs-toggle="modal" data-bs-target="#sellModal" role='button'> Vender Producto </a>
    </div>
    @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <h5 class="card-header">Productos</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="productsTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    
<div class="modal fade" id="sellModal" tabindex="-1" aria-labelledby="sellModallLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="sellModallLabel">Vender Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="{{ route('savesell') }}">
        @csrf  
          <div class="mb-3">
            <label for="product_id" class="col-form-label">Selecionar Producto:</label>
            <select class="form-select" id="product_id" name="product_id">
                
            </select>
          </div>
          <div class="mb-3">
            <label for="amount" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="amount" name="amount">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary evt-guardar">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div> 
</div>
<script src="{{ asset('js/main.js')}}"></script>
@endsection