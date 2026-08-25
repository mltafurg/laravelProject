@extends('layouts.app')
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container"> 
  <div class="row">
    <div class="col-lg-4 ms-auto">
      <p class="lead">{{ $viewData["name"] }}</p>
    </div>
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $viewData["dir"] }}</p>
    </div>
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $viewData["tel"] }}</p>
    </div>
  </div>
</div>
@endsection
