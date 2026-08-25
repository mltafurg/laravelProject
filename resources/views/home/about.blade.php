@extends('layouts.app')
@section('title', $viewData["title"]) <!-- php variables! -->
@section('subtitle',  $viewData["subtitle"])
@section('content')
<div class="container"> <!-- for that content, we create a 4x4 table each one of the rows 
  is gotta show author and description-->
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
