

@extends('layout.app')

@section('content')


<div class="container">
    <table class="table">
        <tr class="table-warning">
            <th>Date Joined</th>
            <th>Quiz Title</th>
            <th>Hosted By</th>
        </tr>
        @foreach ($games as $game)
      
        <tr>
            <td>{{$game->created_at}}</td>
            <td>{{$game->quiztitle}}</td>
            <td>{{$game->quizauthor}}</td>

        </tr>
        @endforeach
 
    </table>
</div>

@endsection