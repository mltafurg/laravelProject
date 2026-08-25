@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!-- OJO, DON'T CONFUSE THIS WITH THE PRODUCTS INDEX
 this does not bring the same data as the index function
 but rather the one from the show function, which displays the info of a single product
 if the id is given to the controller's function --> 
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        @if ($viewData["product"]->getPrice() > 80)
         <span class = "text-danger"> 
         <h5 class="card-title">
           {{ $viewData["product"]->getName() }}
          </h5>
         </span>
         @else
         <h5 class="card-title">
           {{ $viewData["product"]->getName() }}
          </h5>
         @endif
       <p class="card-text">{{ $viewData["product"]->getPrice()}}</p>
         @foreach($viewData["product"]->comments as $comment)
          - {{ $comment->getDescription() }}<br />
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

<!-- IMPORTANT!, as we already know, viewData has a product inside which is all the product's info
 but then how do we access a single piece of data?
 with a bracket next to it, meaning [outer array data][inner array data], and since we have
 an array inside another one, we put product (array) and name which is inside product
 
 With databases it's similar because, having an object in product, the object has an internal method that allows searching
 with brackets or arrows for the attribute found in the attributes dict and returns the value
 
 WE ADD GETTERS
 -->