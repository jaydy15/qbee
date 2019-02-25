@extends('layout.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['QuizzesController@update', $quiz->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $quiz->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('category','Category')}}
            {{Form::select('category', 
            ['Animals' => 'Animals', 
            'Science' => 'Science',
            'Math' => 'Math',

            ], 


            null, ['class'=> 'form-control' ,'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection