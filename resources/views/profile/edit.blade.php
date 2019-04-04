@extends('layout.app')

@section('content')
    <h1>Edit User</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>

        <div class="form-group">
            {{Form::label('email', 'email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email'])}}
        </div>

        <div class="form-group">
            {{Form::label('password', 'password')}}
            {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>



        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection