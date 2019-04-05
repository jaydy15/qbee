

@extends('layout.app')

@section('content')


<div class="container">
@if(count($games)>0)

<a href="/download" class="btn btn-success">Export</a>
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
@else
    <p>No History Yet</p>
@endif
</div>

@endsection