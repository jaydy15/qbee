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
                <span id="seconds"></span>
                <div class="smalltext">Seconds</div>
            </div>
        </div>
</div>

<div id="box">
        @php $index = 0; $hideClass = ""; @endphp
        @foreach($questions as $question)
        @php if($index > 0){
            $hideClass = "d-none";
        }
        @endphp
            <div class="question card border-info mb-3 mt-3 {{$hideClass}}" id="q{{$index}}" style="border-color:red !important;">
                <div class="row p-3">
                    <div class="col-md-8 col-sm-8 ">
                        <h3>{{$questions[$index]->question}}</h3>
                        <input type="hidden" id="value{{$index}}" value="{{$questions[$index]->time_limit}}">
                       @if (($questions[$index]->question_type) == 'mc' || ($questions[$index]->question_type) == 'a')


                       <table class="table">
                        <tbody>
                            <tr>
                            <td><button value="1" id="choice1" onclick="getMulti()" class="btn btn-lg btn-block" style="background-color:#779ecb">{{$questions[$index]->choice1}}</button></td>
                            <td><button value="2" id="choice2" class="btn btn-lg btn-block" style="background-color:#ff6961">{{$questions[$index]->choice2}}</button></td>
                            </tr>

                            <tr>
                            <td><button value="3" id="choice3" class="btn btn-lg btn-block" style="background-color:#cb99c9">{{$questions[$index]->choice3}}</button></td>
                            <td><button value="4" id="choice4" class="btn btn-lg btn-block" style="background-color:#77dd77">{{$questions[$index]->choice4}}</button></td>
                            </tr>
                        </tbody>
                        </table>

                        @elseif (($questions[$index]->question_type) == 'tf' || ($questions[$index]->question_type) == 'b')
                        
                        <button value="1" class="btn btn-lg btn-block" style="background-color:#A0BABD">TRUE</button>
                        <br>
                        <button value="0" class="btn btn-lg btn-block" style="background-color:#904B4E">FALSE</button>
                        <br>
                        @elseif (($questions[$index]->question_type) == 'shan' || ($questions[$index]->question_type) == 'c')
                        <label for="answer" class="font-weight-bold">Your Answer</label>
                        <input type="text" name="" id="answer" class="form-control"> 
                        
                        <input type="submit" value="submit" class="btn btn-success mt-3 ">
                       @endif

                    </div>
                </div>
            </div>
            @php $index++; @endphp
        @endforeach
        <div id="hi"></div>
    @else
    <div class="container">
        <div class="jumbotron jumbotron-fluid border border-danger m-5">
          <div class="container">
            <h1 class="display-4 font-weight-bold text-center ">WAITING .....</h1>
          </div>
        </div>
    </div>
    @endif
</div>

<script>
function getMulti(){
var getMultiple = document.getElementById("choice1").value;

jQuery.ajax({
    url: "{{ url('/lobby/check') }}",
    method: 'post',
    data: {choice1:getMultiple},
    success: function(result){
       console.log(result);
    }});
}
</script>

<script>
var timeleft = document.getElementById("value0").value;
timerCount();
function timerCount(){
    var downloadTimer = setInterval(function(){
        document.getElementById("seconds").innerHTML = timeleft;
        timeleft -= 1;
        if(timeleft == 0){
            loopBox();
        clearInterval(downloadTimer);
        document.getElementById("seconds").innerHTML = ""
        }
    }, 1000);
}
</script>
            
<script>

function loopBox() {
    var currentQ;
    var qS = $("#box").children(".question");
    console.log("qS: " + qS);
    console.log("qSsize: " + qS.length);
    qS.each(function(index){
        var q = $(this);
        console.log("q: " + q);
        console.log("qid: " + q.attr('id'));
            if(!$(this).hasClass("d-none")) {
                console.log("no hidden");
                currentQ =  $(this).attr("id");
              }
              var a = $(this).addClass("d-none");
               
    });
    console.log("currentQ: " + currentQ);
                  currentQ = currentQ.replace('q', '');
                  var nextQ = parseInt(currentQ) + 1;
                  console.log("nextQ: " + nextQ);
                  var c = "q" + nextQ;
                  console.log("c: " + c);
                  $("#q" + nextQ).removeClass("d-none");
                  timeleft = $('#value' + nextQ).val();
                  timerCount();                      
}
</script>
@endsection