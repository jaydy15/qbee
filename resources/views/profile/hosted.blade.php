@extends('layout.app')

@section('content')


@if(count($games)>0)

<a href="/download" class="btn btn-success">Export</a>
<h1>Hosted Quiz</h1>
    <table class="table">
        <tr class="table-warning">
            <th>Participants</th>
            <th>Score</th>
            <th>Comment</th>
            <th>Reaction</th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{$game->user_id}}</td>
            <td>{{$game->total_score}}</td>
            <td>{{$game->comment}}</td>
            <td>{{$game->reaction}}</td>
        </tr>
        @endforeach
    </table>
@endif

@endsection
