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
@if(count($lobby_users)>0)
<table class="table">
    <tr class="table-warning">
        <th><h1 class="display-4 font-weight-bold text-center table-danger">Users</h1></th>
    </tr>
    @foreach($lobby_users as $lobby_user)
      <table>
        <tr>
          <td><h1 class="display-5 font-weight-bold text-center table-info">{{$lobby_user->user_name}}</h1></td>  
        </tr> 
      </table>    
    @endforeach
</table>

@else
<h1 class="display-4 font-weight-bold text-center table-danger">No User</h1> 
@endif

<a href="/lobby/index/{{$quiz->id}}/start" id="clickRefresh" class="btn btn-warning">Start Quiz</a>

<script type="text/javascript">
  setTimeout(function(){
      location.reload();
  },2000);
</script>

{{-- <script>
localStorage.setItem("update", "0");
$('body').on('click', '#clickRefresh', function(){
  localStorage.setItem("update", "1");
});
</script> --}}
@endsection