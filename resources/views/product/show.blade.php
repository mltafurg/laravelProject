@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!-- OJO, NO CONFUNDIRSE CON EL INDEX DE PRODUCTOS
 este no trae el mimso dato de la funcion index 
 sino el de la funcion de show que muestra la info de un producto 
 si le entregan el id a la funcion del controller --> 
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]["name"] }}
<!-- IMPORTANT!, como ya sabemos el viewdata tiene un product donde adentro esta toda la info de el producto
 pero entonces como accedemos a un solo dato?
 con un corchete al lado, significa que [dato del arreglo ext][dato del arreglo int], y como tenemos 
 un arreglo adentro de otro entonces ponemos product (arrelgo) y name que esta adentro de product  
 -->
        </h5>
        <p class="card-text">{{ $viewData["product"]["description"]}}</p>
<!-- lo mimso pasa aqui -->
       <p class="card-text">{{ $viewData["product"]["price"]}}</p>
      </div>
    </div>
  </div>
</div>
@endsection
