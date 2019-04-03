@extends('layout.app')

@section('content')
<h1>{{$quiz->title}}</h1>
    <div>

        <p>{{$quiz->category}}</p>
        
    
    <div class="container">
      <table class="table table-striped">
        @foreach($questions as $question)
            <div class="card border-info mb-3 mt-3">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a>{{$question->question}}</a></h3>
                        <div class="text-right">
                        </div>
                        <small>Category on {{$question->question_type}}</small>
                    </div>
                </div>
            </div>
        @endforeach
<a href="/lobby/index/{{$quiz->id}}/end" class="btn btn-warning">End Quiz</a>
@endsection
