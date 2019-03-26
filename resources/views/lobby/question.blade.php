   @extends('layout.app')

   @section('content')
   <style>
        #clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 100;
            text-align: center;
            font-size: 30px;
        }

        #clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            background: #00BF96;
            display: inline-block;
        }

        #clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            background: #00816A;
            display: inline-block;
        }

        .smalltext{
            padding-top: 5px;
            font-size: 16px;
        }
   </style>


    @if(count($questions) > 0)
<div class="container text-center">
    <h1>Countdown Timer</h1>
        <div id="clockdiv">
            <div>
                <span class="seconds"></span>
                <div class="smalltext">Seconds</div>
            </div>
        </div>
</div>
        @foreach($questions as $question)
            <div class="card border-info mb-3 mt-3" style="border-color:red !important">
                <div class="row p-3">
                    <div class="col-md-8 col-sm-8 ">
                        <h3>{{$question->question}}</h3>
                        <input type="hidden" id="value" value="{{$question->time_limit}}">
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


<script>
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var timeGet = document.getElementById("value").value;
  var seconds = Math.floor((t / 1000) % timeGet);
  return {
    'total': t,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>
@endsection