@extends('layout.app')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid m-5">
    <div class="container">
        <h3>Enter this game pin to join:</h3>
    </div>
  <div class="container">
    <h1 class="display-4 font-weight-bold text-center">{{$quiz->game_pin}}</h1>
  </div>
</div>
</div>
@endsection