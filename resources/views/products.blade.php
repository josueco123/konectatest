@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2 mt-2">
        <a class='btn btn-primary' href="{{ route('saveproduct') }}" role='button'> Agregar Producto </a>
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


    
    
</div>
<script>
        $(document).ready(function() {
            console.log(window.location.origin )
            $('#productsTable').DataTable({
                "bLengthChange": false,
                ajax: {
                    url: window.location.origin +  '/api/getproducts', 
                    dataSrc: 'products' 
                },
                columns: [
                    { data: 'name' }, 
                    { data: 'reference' },
                    { data: 'category' }, 
                    { data: 'price' }, 
                    { data: 'weight' }, 
                    { data: 'stock' }, 
                    { "defaultContent": true,render: function ( data, type, row ) {
                        return "<a class='btn btn-success btn-sm' href='#' role='button'>Vender </a> " + 
                        " <a class='btn btn-primary btn-sm' role='button' href='{{ url('editproduct/') }}/"+ row["id"] + "'> Editar </a> " +
                        " <a href='{{ url('deletproduct/') }}/"+ row["id"] + "' role='button' class='btn btn-danger btn-sm'  data-confirm-delete='true'>Eliminar </a>";
             
                    } }
                ]
            });
        });
    </script>
@endsection