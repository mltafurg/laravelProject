@extends('layouts.app')
@section('title', $viewData["title"]) <!-- las variables en php! -->
@section('subtitle',  $viewData["subtitle"])
@section('content')
<div class="container"> <!-- para ese contenido se realiza una tabla
    de 4x4 cada una va a tener una info que sale de las 
    variables de descripcion y autor -->
  <div class="row">
    <div class="col-lg-4 ms-auto">
      <p class="lead">{{ $viewData["description"]}}</p>
    </div>
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $viewData["author"] }}</p>
    </div>
  </div>
</div>
@endsection
