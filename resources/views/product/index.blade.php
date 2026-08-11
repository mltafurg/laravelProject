@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!-- en layout esta el lugar dinamico para colocar los datos
 aqui solo estamos colocando los nombres de las varaibles del controller
 para que se muestren aqui en pantalla
 en el contenido van a asalir cada producto --> 
<div class="row">
  @foreach ($viewData["products"] as $product)
  <!-- se recorre un prodcuto con un for each para mostrar cada uno
   con su info (id y su nombre) --> 
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product["id"]]) }}"
          class="btn bg-primary text-white">{{ $product["name"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
