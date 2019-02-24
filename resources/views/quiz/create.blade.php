@extends('layout.app')

@section('content')
    <h1>Create Quiz</h1>
    
    {!! Form::open(['action' => 'QuizzesController@store', 'method'=>'POST', 'enctype'=>'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=> 'form-control', 'placeholder' => 'Title'])}}
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
            {{Form::label('description','Description')}}
            {{Form::text('description','',['class'=> 'form-control', 'placeholder' => 'Description'])}}
        </div>



        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection