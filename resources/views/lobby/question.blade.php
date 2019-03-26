<!-- @extends('layout.app')

@section('content')
    <h1>Questions</h1>
    <a href="/questions/create" class="btn btn-default">Add Question</a>
    @if(count($questions) > 0)

        @foreach($questions as $question)
            <div class="card border-info mb-3 mt-3" style="border-color:red !important">
                <div class="row p-3">
                    <div class="col-md-8 col-sm-8 ">
                        <h3>{{$question->question}}</h3>
                       @if (($question->question_type) == 'mc' || ($question->question_type) == 'a')


                       <table class="table">
                        <tbody>
                            <tr>
                            <td><input type="button" value="{{$question->choice1}}" id="choice1" class="btn btn-lg btn-block" style="background-color:#779ecb"></td>
                            <td><input type="button" value="{{$question->choice2}}" id="choice2" class="btn btn-lg btn-block" style="background-color:#ff6961"></td>
                            </tr>

                            <tr>
                            <td><input type="button" value="{{$question->choice3}}" id="choice3" class="btn btn-lg btn-block" style="background-color:#cb99c9"></td>
                            <td><input type="button" value="{{$question->choice4}}" id="choice4" class="btn btn-lg btn-block" style="background-color:#77dd77"></td>
                            </tr>
                        </tbody>
                        </table>

                        @elseif (($question->question_type) == 'tf' || ($question->question_type) == 'b')
                        <input type="button" value="TRUE" {{($question->true_false== '1')}}  class="btn btn-lg btn-block" style="background-color:#A0BABD">
                        <br>
                        <input type="button" value="FALSE" {{($question->true_false=='0')}}  class="btn btn-lg btn-block" style="background-color:#904B4E">
                        <br>
                        @elseif (($question->question_type) == 'shan' || ($question->question_type) == 'c')
                        <label for="answer" class="font-weight-bold">Your Answer</label>
                        <input type="text" name="" id="answer" class="form-control"> 
                        
                        <input type="submit" value="submit" class="btn btn-success mt-3 ">
                       @endif

                    </div>
                </div>
            </div>
        @endforeach
   
    @else
        <p>No posts found</p>
    @endif
@endsection -->



{{$game_pin}}