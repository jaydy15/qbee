@extends('layout.app')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid border border-danger m-5">
    <div class="container">
        <h3>Enter this game pin to join:</h3>
    </div>
  <div class="container">
    <h1 class="display-4 font-weight-bold text-center ">{{$quiz->game_pin}}</h1>
  </div>
</div>
</div>
@if(count($users)>0)
@foreach($users as $user)
  <table>
    <tr>
      {{$user->name}}  
    </tr> 
  </table>    
@endforeach
@else
  <p>no user</p>
@endif

<a href="/lobby/index/{{$quiz->id}}/start" class="btn btn-warning">Start Quiz</a>
<a href="/lobby/index/{{$quiz->id}}/end" class="btn btn-warning">End Quiz</a>
<script type="text/javascript">
  setTimeout(function(){
      location.reload();
  },1000);
</script>
@endsection