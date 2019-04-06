

@extends('layout.app')

@section('content')


<div class="container">
@if(count($games)>0)


<h1>Joined Quiz</h1>
    <table class="table">
        <tr class="table-warning">
            <th>Date Joined</th>
            <th>Quiz Title</th>
            <th>Hosted By</th>
            <th>Score Acquired</th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{$game->created_at}}</td>
            <td>{{$game->quiztitle}}</td>
            <td>{{$game->quizauthor}}</td>
            <td>{{$game->total_score}}</td>
        </tr>
        @endforeach
    </table>
@endif
@if(count($quizzes)>0)
    <h1>Hosted Quiz</h1>
    <table class="table">
        <tr class="table-warning">
            <th>Quiz Title</th>
            <th>Date Hosted</th>
            <th>Game Pin </th>
        </tr>
        @foreach ($quizzes as $quiz)
        <tr>
            <td><a href="/history/{{$quiz->id}}">{{$quiz->title}}</td>
            <td>{{$quiz->updated_at}}</td>
            <td>{{$quiz->game_pin}}</td>

        </tr>
        @endforeach
    </table>
@else
    <p>No Hosted Quiz Yet</p>
@endif
</div>

@endsection