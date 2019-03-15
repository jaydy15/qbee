@extends('layout.app')

@section('content')

    <h1>{{$quiz->title}}</h1>
    <div>

        <p>{{$quiz->category}}</p>
        <a href="" class="btn btn-info" data-toggle="modal" data-target="#createmodal">Add Question</a>

        @foreach($questions as $question)
            <div class="card">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a>{{$question->question}}</a></h3>
                        <div class="text-right">
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" data-id="{{$question->id}}" data-question="{{$question->question}}" data-questype="{{$question->question_type}}" data-points="{{$question->points}}" data-time="{{$question->time_limit}}">Edit</button> -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deletemodal">Delete</button>
                        </div>
                        <small>Category on {{$question->question_type}}</small>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Modal create -->
            <div class="modal fade" id="createmodal" tabindex="-1" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Question</h5>
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
                                <select class="form-control" id="question_type" name="question_type" onchange="onChange">
                                    <option selected="selected" value=""></option>
                                    <option value="mc">Multiple Choice</option>
                                    <option value="tf">True or False</option>
                                    <option value="shan">Short Answer</option>
                                </select>
                            </div>

                            <!-- hidden div for select -->

                            <div id="mc" class="choices" style="display: none;">
                                <label for="choice1">Choice 1</label>
                                <input class="form-control" placeholder="Choice 1" name="choice1" type="text" value="" id="choice1">

                                <label for="choice2">Choice 2</label>
                                <input class="form-control" placeholder="Choice 2" name="choice2" type="text" value="" id="choice2">

                                <label for="choice3">Choice 3</label>
                                <input class="form-control" placeholder="Choice 3" name="choice3" type="text" value="" id="choice3">
                                
                                <label for="choice4">Choice 4</label>
                                <input class="form-control" placeholder="Choice 4" name="choice4" type="text" value="" id="choice4">
                            </div>

                            <div id="tf" class="choices" style="display: none;">
                                {{ Form::label('true_false', 'Answer')}}
                                {{ Form::radio('true_false', '1')}} True
                                {{ Form::radio('true_false', '0')}} False
                            </div>

                            <div id="shan" class="choices" style="display: none;">
                                <label for="short_answer">Answer</label>
                                <input class="form-control" placeholder="Answer" name="short_answer" type="text" value="" id="short_answer">
                            </div>

                            <!-- end of hidden select -->

                            <div class="form-group">
                                <label for="points">Points</label>
                                <input class="form-control" placeholder="Points" name="points" type="text" value="" id="points">
                            </div>

                            <div class="form-group">
                                <label for="time_limit">Time Limit</label>
                                <input class="form-control" placeholder="Time Limit" name="time_limit" type="text" value="" id="time_limit">
                            </div>


                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
               </div>
            <!-- end of modal create -->


        <!-- Modal edit -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{url('')}}/questions/{{$question->id}}/edit" method="post">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <input type="hidden" name="question_id" id="question_id" value="">
                        @include('question.form')
                        </form>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                           
                        </div>
                    </div>
               </div>
            <!-- end of modal edit -->


            <!-- Modal delete -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                            <p>Are you sure you want to delete it?</p>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                {!!Form::open(['action' => ['QuestionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Yes', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </div>
                           
                        </div>
                    </div>
               </div>
            <!-- end of modal delete -->

    </div>
    <hr>


    <small>Written on {{$quiz->created_at}} by {{$quiz->user->name}}</small>
    <hr>

    <a href="/quizzes" class="btn btn-primary">Go Back</a>


<script>

$(function() {

$('#question_type').change(function(){
$('.choices').hide();
$('#' + $(this).val()).show();
});

});

</script>
<script>
  
  $('#editmodal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var question = button.data('question')
      var questype = button.data('question_type')
      var points = button.data('points')
      var time = button.data('time') 
      var modal = $(this)
      modal.find('.modal-body #question').val(question);
      modal.find('.modal-body #question_type').val(questype);
      modal.find('.modal-body #points').val(points);
      modal.find('.modal-body #time').val(time);
    
})
</script>

<script>
function getId(id) {
    $('#editmodal').modal('show'); 
    document.getElementById("question_id").innerHTML = id;
}
</script>
@endsection
