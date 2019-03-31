{{$quizid}}
{{$quiz_id}}
{{$id}}

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
        @foreach ($quizzes as $quiz)
        <tr>
            <td>{{$game->created_at}}</td>
            <td>{{$quiz->title}}</td>
        </tr>
        @endforeach
        @endforeach
    </table>
</div>

@endsection