@extends('layout.app')

@section('content')

    <h1>{{$quiz->title}}</h1>
    <div>

        <p>{{$quiz->category}}</p>
        <a href="" class="btn btn-info" data-toggle="modal" data-target="#createmodal">Add Question</a>
    
    <div class="container">
      <table class="table table-striped">
        @foreach($questions as $question)
            <div class="card border-info mb-3 mt-3">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a>{{$question->question}}</a></h3>
                        <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" data-id="{{$question->id}}" data-question="{{$question->question}}" data-questype="{{$question->question_type}}" data-trufal="{{$question->true_false}}" data-rightanswer="{{$question->right_answer}}" data-points="{{$question->points}}" data-time="{{$question->time_limit}}">Edit</button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deletemodal">Delete</button>
                        </div>
                        <small>Category on {{$question->question_type}}</small>
                    </div>
                </div>
            </div>
        @endforeach


        {{ $questions->links() }}
        
@endsection
