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
                        {{-- <div class="text-right">
                        <a href="/questions/{{$question->id}}/edit" class="btn btn-primary">Edit</a>
                        <a href="/questions/{{$question->id}}/edit" class="btn btn-primary">Skip</a>

                        </div> --}}
                        <!-- Question Type -->
                            @if (($question->question_type) == 'mc' || ($question->question_type) == 'a')
                        <div class="container">
                            <small>Question Type: Multiple Choice</small> 
                            <!-- correct answer -->
                                @if(($question->right_answer)== 1)
                                    <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer:{{$question->choice1}}</small>

                                @elseif(($question->right_answer)== 2)
                                    <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer:{{$question->choice2}}</small>

                                @elseif(($question->right_answer)== 3)
                                    <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer:{{$question->choice3}}</small>

                                @elseif(($question->right_answer)== 4)
                                    <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer:{{$question->choice4}}</small>

                                @endif
                            <!-- end of correct answer -->
                            @elseif (($question->question_type) == 'tf' || ($question->question_type) == 'b')
                            <div class="container">
                            <small>Question Type: True or False</small>
                            <!-- correct answer --> 
                                @if(($question->true_false)== 1)
                                        <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer: True</small>
                                @elseif(($question->true_false)== 0)
                                        <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer: False</small>
                                @endif
                            </div>
                            <!-- correct answer --> 
                            @elseif (($question->question_type) == 'shan' || ($question->question_type) == 'c') 
                            <div class="container">
                                <small>Question Type:Short Answer</small> 
                                <small class="pl-2 ml-2" style="font-weight:bold">Correct Answer:{{$question->short_answer}}</small>  
                            </div>
                            @endif
                        </div> 
                        <!-- End of Question Type -->
                    </div>
                </div>
            </div>
        @endforeach
<a href="/lobby/index/{{$quiz->id}}/end" class="btn btn-warning">End Quiz</a>
@endsection
