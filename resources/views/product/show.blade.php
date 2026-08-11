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
        </h5>
        <p class="card-text">{{ $viewData["product"]["description"] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
