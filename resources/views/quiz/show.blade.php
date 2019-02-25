@extends('layout.app')

@section('content')
   
    <h1>{{$quiz->title}}</h1>
    <div>

        <p>{{$quiz->category}}</p>

        {{--  {!!$post->body!!}  --}}
    </div>
    <hr>
   
        
 
    <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small>
    <hr>

    <a href="/quizzes" class="btn btn-primary">Go Back</a>
    @if (!Auth::guest())
        @if(Auth::user()->id == $quiz->user_id)
        <hr>
                <a href="/quizzes/{{$quiz->id}}/edit" class="btn btn-default">Edit</a>
                {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
        @endif
    @endif
@endsection