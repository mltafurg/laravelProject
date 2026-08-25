@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!-- in the layout is the dynamic place to put the data
 here we are just placing the names of the controller's variables
 so that they are displayed here on screen
 each product will appear in the content --> 
  @foreach ($viewData["products"] as $product)
 <!-- we loop through a product with a foreach to display each one
   with its info (id and its name) --> 
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product["id"]]) }}"
          class="btn bg-primary text-white">{{ $product->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
