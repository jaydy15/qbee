@extends('layout.app')

@section('content')
    <h1>Questions</h1>
    <a href="/questions/create" class="btn btn-default">Add Question</a>
    @if(count($questions) > 0)

        @foreach($questions as $question)
            <div class="card">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/questions/{{$question->id}}">{{$question->question}}</a></h3>
                        <small>Category on {{$question->question_type}}</small>
                    </br>
                        <small>Created on {{$question->created_at}}</small>

                    </div>
                </div>
            </div>
        @endforeach
   
    @else
        <p>No posts found</p>
    @endif
@endsection