



        <!-- Form -->
        <div class="form-group">
            <label for="question">Question</label>
            <input class="form-control" placeholder="Question" name="question" type="text" value="{{$question->question}}" id="question">
        </div>

        <div class="form-group">
            <label for="question_type2">Question Type</label>
            <select class="form-control" id="type" name="question_type">
                <option selected="selected" value="" ></option>
                <option value="a">Multiple Choice</option>
                <option value="b">True or False</option>
                <option value="c">Short Answer</option>
            </select>
        </div>

        <!-- hidden div for select -->

        <div id="a" class="choices" style="display: none;">
             @if($question->right_answer=="1")
                 <label for="choice1">Choice 1 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '1', ["checked" => ""])}}
                 <input class="form-control" placeholder="Choice 1" value="{{$question->choice1}}" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

                 <label for="choice2">Choice 2 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '2')}}
                 <input class="form-control" placeholder="Choice 2" value="{{$question->choice2}}" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

                 <label for="choice3">Choice 3 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '3')}}
                 <input class="form-control" placeholder="Choice 3" value="{{$question->choice3}}" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">

                 <label for="choice4">Choice 4 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '4')}}
                 <input class="form-control" placeholder="Choice 4" value="{{$question->choice4}}" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">

            @elseif($question->right_answer=="2")
               <label for="choice1">Choice 1 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '1')}}
               <input class="form-control" placeholder="Choice 1" value="{{$question->choice1}}" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

               <label for="choice2">Choice 2 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '2', ["checked" => ""])}}
               <input class="form-control" placeholder="Choice 2" value="{{$question->choice2}}" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

               <label for="choice3">Choice 3 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '3')}}
               <input class="form-control" placeholder="Choice 3" value="{{$question->choice3}}" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">

               <label for="choice4">Choice 4 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '4')}}
               <input class="form-control" placeholder="Choice 4" value="{{$question->choice4}}" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">

          @elseif($question->right_answer=="3")
             <label for="choice1">Choice 1 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '1')}}
             <input class="form-control" placeholder="Choice 1" value="{{$question->choice1}}" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

             <label for="choice2">Choice 2 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '2')}}
             <input class="form-control" placeholder="Choice 2" value="{{$question->choice2}}" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

             <label for="choice3">Choice 3 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '3', ["checked" => ""])}}
             <input class="form-control" placeholder="Choice 3" value="{{$question->choice3}}" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">

             <label for="choice4">Choice 4 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '4')}}
             <input class="form-control" placeholder="Choice 4" value="{{$question->choice4}}" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">

          @elseif($question->right_answer=="4")
            <label for="choice1">Choice 1 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '1')}}
            <input class="form-control" placeholder="Choice 1" value="{{$question->choice1}}" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

            <label for="choice2">Choice 2 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '2')}}
            <input class="form-control" placeholder="Choice 2" value="{{$question->choice2}}" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

            <label for="choice3">Choice 3 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '3')}}
            <input class="form-control" placeholder="Choice 3" value="{{$question->choice3}}" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">

            <label for="choice4">Choice 4 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '4', ["checked" => ""])}}
            <input class="form-control" placeholder="Choice 4" value="{{$question->choice4}}" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">

          @else
             <label for="choice1">Choice 1 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '1')}}
             <input class="form-control" placeholder="Choice 1" value="{{$question->choice1}}" name="choice1" type="text" value="{{$question->choice1}}" id="choice1">

             <label for="choice2">Choice 2 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '2')}}
             <input class="form-control" placeholder="Choice 2" value="{{$question->choice2}}" name="choice2" type="text" value="{{$question->choice2}}" id="choice2">

             <label for="choice3">Choice 3 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '3')}}
             <input class="form-control" placeholder="Choice 3" value="{{$question->choice3}}" name="choice3" type="text" value="{{$question->choice3}}" id="choice3">

             <label for="choice4">Choice 4 &nbsp;&nbsp;</label> Corrret Answer {{ Form::radio('right_answer', '4')}}
             <input class="form-control" placeholder="Choice 4" value="{{$question->choice4}}" name="choice4" type="text" value="{{$question->choice4}}" id="choice4">
          @endif
        </div>

        <div id="b" class="choices" style="display: none;">
             @if($question->true_false=="1")
                 <label for="true_false">Answer</label>
                 {{ Form::radio('true_false', '1', ["checked" => ""])}} True
                 {{ Form::radio('true_false', '0')}} False
             @elseif($question->true_false=="0")
                 <label for="true_false">Answer</label>
                 {{ Form::radio('true_false', '1')}} True
                 {{ Form::radio('true_false', '0', ["checked" => ""])}} False
             @else
                 <label for="true_false">Answer</label>
                 {{ Form::radio('true_false', '1')}} True
                 {{ Form::radio('true_false', '0')}} False
             @endif
        </div>

        <div id="c" class="choices" style="display: none;">
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
