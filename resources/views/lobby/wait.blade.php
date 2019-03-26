@extends('layout.app')

@section('content')
<h1>Join Quiz</h1>
    {!! Form::open(['action' => 'lobbyController@lobby', 'method'=>'POST', 'enctype'=>'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('game_pin','Game Pin')}}
            {{Form::text('game_pin','',['class'=> 'form-control', 'placeholder' => ''])}}
        </div>

    
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
    @endsection
