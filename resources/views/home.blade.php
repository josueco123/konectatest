@extends('layouts.main')

@section('content')
<div class="container">
<div class="row  mt-2">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Producto con mayor Stock</h5>
        <p class="card-text">{{ $productstorck->name }}: {{ $productstorck->stock }} </p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Producto más vendido</h5>
        <p class="card-text">{{ $sellsproduct->name }}: {{ $sellsproduct->total_sells }} </p>
       
      </div>
    </div>
  </div>
</div>
<div class="card mt-2">
  <div class="card-body">
    <h5 class="card-title">Productos de Vendidos</h5>
    <div id="chartdiv" style="width: 100%; height: 400px;"></div>
  </div>
</div>
</div>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="{{ asset('js/chart.js') }}" defer></script>
@endsection