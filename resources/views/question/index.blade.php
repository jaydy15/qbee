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
                       @if (($question->question_type) == 'mc')
                           <input type="button" value="{{$question->choice1}}" id="choice1">
                           <br>
                           <input type="button" value="{{$question->choice2}}" id="choice2">
                           <br>
                           <input type="button" value="{{$question->choice3}}" id="choice3">
                           <br>
                           <input type="button" value="{{$question->choice4}}" id="choice4">
                           <br>
                        @elseif (($question->question_type) == 'tf')
                        <input type="button" value="TRUE" {{($question->true_false== '1')}}>
                        <br>
                        <input type="button" value="FALSE" {{($question->true_false=='0')}}>
                        <br>
                        @elseif (($question->question_type) == 'shan')
                        <label for="answer">Your Answer</label>
                        <input type="text" name="" id="answer">
                        
                        <input type="submit" value="submit">
                       @endif

                    </div>
                </div>
            </div>
        @endforeach
   
    @else
        <p>No posts found</p>
    @endif
@endsection