@extends('layout.app')

@section('content')


@if(count($games)>0)


<h1>Hosted Quiz</h1>
    <table class="table">
        <tr class="table-warning">
            <th>Participants</th>
            <th>Score</th>
            <th>Comment</th>
            <th>Reaction</th>
            <th></th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{$game->name}}</td>
            <td>{{$game->total_score}}</td>
            <td>{{$game->comment}}</td>
            <td>{{$game->reaction}}</td>
        </tr>
        @endforeach
    </table>
@endif

@endsection
