

    <form action="{{url('')}}/questions/{{$question->id}}/edit" method="post">
        {{method_field('patch')}}
        {{csrf_field()}}
        <input type="hidden" name="question_id" id="question_id" value="">

        <!-- Form -->
        <div class="form-group">
            <label for="question">Question</label>
            <input class="form-control" placeholder="Question" name="question" type="text" value="{{$question->question}}" id="question">
        </div>

        <div class="form-group">
            <label for="question_type2">Question Type</label>
            <select class="form-control" id="question_type" name="question_type" value="{{$question->question_type}}" onchange="onChange">
                <option selected="selected" value="" ></option>
                <option value="mc">Multiple Choice</option>
                <option value="tf">True or False</option>
                <option value="shan">Short Answer</option>
            </select>
        </div>

        <!-- hidden div for select -->

        <div id="mc" class="choices" style="display: none;">
            <label for="choice1">Choice 1</label>
            <input class="form-control" placeholder="Choice 1" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

            <label for="choice2">Choice 2</label>
            <input class="form-control" placeholder="Choice 2" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

            <label for="choice3">Choice 3</label>
            <input class="form-control" placeholder="Choice 3" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">
            
            <label for="choice4">Choice 4</label>
            <input class="form-control" placeholder="Choice 4" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">
        </div>

        <div id="tf" class="choices" style="display: none;">
            {{ Form::label('true_false', 'Answer')}}
            {{ Form::radio('true_false', '1')}} True
            {{ Form::radio('true_false', '0')}} False
        </div>

        <div id="shan" class="choices" style="display: none;">
            <label for="short_answer">Answer</label>
            <input class="form-control" placeholder="Answer" value="{{$question->short_answer}}" name="short_answer" type="text" id="short_answer">
        </div>

        <!-- end of hidden select -->

        <div class="form-group">
            <label for="points">Points</label>
            <input class="form-control" placeholder="Points" name="points" type="text" value="{{$question->points}}" id="points">
        </div>

        <div class="form-group">
            <label for="time_limit">Time Limit</label>
            <input class="form-control" placeholder="Time Limit" name="time_limit" type="text" value="{{$question->time_limit}}" id="time_limit">
        </div>
    </form>

