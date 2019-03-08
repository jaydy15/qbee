@extends('layout.app')

@section('content')

    <h1>{{$quiz->title}}</h1>
    <div>

        <p>{{$quiz->category}}</p>
        <a href="" class="btn btn-info" data-toggle="modal" data-target="#demomodal">Add Question</a>

        @foreach($questions as $question)
            <div class="card">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/questions/{{$question->id}}">{{$question->question}}</a></h3>
                        <small>Category on {{$question->question_type}}</small>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Modal -->
            <div class="modal fade" id="demomodal" tabindex="-1" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('')}}/questions/store/{{$quiz->id}}" method="post">
                            {{csrf_field()}}
                        <div class="modal-body">

                            <!-- Form -->
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input class="form-control" placeholder="Question" name="question" type="text" value="" id="question">
                            </div>

                            <div class="form-group">
                                <label for="question_type">Question Type</label>
                                <select class="form-control" id="question_type" name="question_type">
                                    <option selected="selected" value=""></option>
                                    <option value="mc"><a href="#multipleChoice">Multiple Choice</option>
                                    <option value="tf">True or False</option>
                                    <option value="shan">Short Answer</option>
                                </select>
                            </div>

                            <form class="" id="multipleChoice" type="hidden">
                                <label for="question">Choice 1</label>
                                <input class="form-control" placeholder="Choice 1" name="choice1" type="text" value="" id="choice1">

                                <label for="question">Choice 2</label>
                                <input class="form-control" placeholder="Choice 2" name="choice2" type="text" value="" id="choice2">

                                <label for="question">Choice 3</label>
                                <input class="form-control" placeholder="Choice 3" name="choice3" type="text" value="" id="choice3">
                                
                                <label for="question">Choice 4</label>
                                <input class="form-control" placeholder="Choice 4" name="choice4" type="text" value="" id="choice4">
                            </form>

                            <div class="form-group">
                                <label for="points">Points</label>
                                <input class="form-control" placeholder="Points" name="points" type="text" value="" id="points">
                            </div>

                            <div class="form-group">
                                <label for="time_limit">Time Limit</label>
                                <input class="form-control" placeholder="Time Limit" name="time_limit" type="text" value="" id="time_limit">
                            </div>


                        </div>
                            <div class="modal-footer facFooter">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
               </div>


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
