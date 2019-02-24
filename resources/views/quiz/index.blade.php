@extends('layout.app')

@section('content')
    <h1>Quizzes</h1>
    <a href="/quizzes/create" class="btn btn-default">Add Quiz</a>
    @if(count($quizzes) > 0)

        @foreach($quizzes as $quiz)
            <div class="card">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/quizzes/{{$quiz->id}}">{{$quiz->title}}</a></h3>
                        <small>Category on {{$quiz->category}}</small>
                    </br>
                        <small>Created on {{$quiz->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
   
    @else
        <p>No posts found</p>
    @endif
@endsection