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
<link href="{{asset('css/customCss.css')}}" rel="stylesheet" type="text/css">


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
                     <input type="hidden" id="right_answer{{$index}}" value="{{$questions[$index]->right_answer}}">
                     <input type="hidden" id="points{{$index}}" value="{{$questions[$index]->points}}">
                     <input type="hidden" id="true_false{{$index}}" value="{{$questions[$index]->true_false}}">
                     <input type="hidden" id="short_answer{{$index}}" value="{{$questions[$index]->short_answer}}">
                    @if (($questions[$index]->question_type) == 'mc' || ($questions[$index]->question_type) == 'a')


                    <table class="table">
                     <tbody>
                         <tr>
                         <td><button value="1" id="1" onclick="getMulti1(this);" class="btn btn-lg btn-block functionButton" style="background-color:#779ecb">{{$questions[$index]->choice1}}</button></td>
                         <td><button value="2" id="2" onclick="getMulti1(this);" class="btn btn-lg btn-block functionButton" style="background-color:#ff6961">{{$questions[$index]->choice2}}</button></td>
                         </tr>

                         <tr>
                         <td><button value="3" id="3" onclick="getMulti1(this);" class="btn btn-lg btn-block functionButton" style="background-color:#cb99c9">{{$questions[$index]->choice3}}</button></td>
                         <td><button value="4" id="4" onclick="getMulti1(this);" class="btn btn-lg btn-block functionButton" style="background-color:#77dd77">{{$questions[$index]->choice4}}</button></td>
                         </tr>
                     </tbody>
                     </table>

                     @elseif (($questions[$index]->question_type) == 'tf' || ($questions[$index]->question_type) == 'b')

                     <button value="1" id="1" class="btn btn-lg btn-block functionButton" onclick="getTrue(this);" style="background-color:#A0BABD">TRUE</button>
                     <br>
                     <button value="0" id="0" class="btn btn-lg btn-block functionButton" onclick="getTrue(this);" style="background-color:#904B4E">FALSE</button>
                     <br>
                     @elseif (($questions[$index]->question_type) == 'shan' || ($questions[$index]->question_type) == 'c')
                     <label for="answer" class="font-weight-bold">Your Answer</label>
                     <input type="text"  id="answerInput{{$index}}" class="form-control" value="">

                     <button onclick="getAnswer({{$index}});" class="btn btn-success mt-3 functionButton">enter</button>
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
 <script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>
 @endif
</div>




 <!-- modal -->
<div id="openModal" class="modal">
 <div class="modal-content"  style="background:linear-gradient(to right, #348f50, #56b4d3);">
     <div class="modal-body" style="background:linear-gradient(to right, #348f50, #56b4d3);">
     <div class="jumbotron jumbotron-fluid border border-danger m-5">
            <div class="container">
                <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color:background:linear-gradient(to right, #348f50, #56b4d3);"></div>
                <span class="swal2-success-line-tip"></span>
                <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div> 
                <div class="swal2-success-fix" style="background-color:background:linear-gradient(to right, #348f50, #56b4d3);"></div>
                <div class="swal2-success-circular-line-right" style="background:linear-gradient(to right, #348f50, #56b4d3);"></div>
                </div>
            <div class="display-4 font-weight-bold text-center" value="">Points: <span class="hiddenPoints"> </div>
            <div class="display-4 font-weight-bold text-center">Total Points: <span class="totalPoints"></div>
              
            </div>
        </div>
     </div>
 </div>
</div>
 <!-- end modal -->

  <!-- modal -->
<div id="openModalWrong" class="modal">
 <div class="modal-content"  style="background:linear-gradient(to right, #c31432, #240b36);">
     <div class="modal-body" style="background:linear-gradient(to right, #c31432, #240b36);">
        <div class="jumbotron jumbotron-fluid border border-danger m-5">
            <div class="container">
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
                <div class="display-4 font-weight-bold text-center" value="">Points: <span class="hiddenPoints"> </div>
                <div class="display-4 font-weight-bold text-center">Total Points: <span class="totalPoints"></div>
              
            </div>
        </div>
    </div>
 </div>
</div>
 <!-- end modal -->

<script>
var totalPoint = 0;
function totalPoints(getPoInt){
 totalPoint = totalPoint + getPoInt;

console.log("totalPoints " + totalPoint);
$('.totalPoints').html(totalPoint);

}
</script>



<script>

var getAns = document.getElementById("right_answer0").value;

var getShorAns = document.getElementById("short_answer0").value;

var getTrufal = document.getElementById("true_false0").value;

var getPo = document.getElementById("points0").value;

function getMulti1(button){
var getMultiple1 = button.id;

if (getMultiple1 == getAns){
 //    console.log("nextq" + nextQ);
 var getPoInt = parseInt(getPo);
 
    $('.hiddenPoints').html(getPoInt);
        totalPoints(getPoInt);
    }
    else {
        $('.hiddenPoints').html(0);
        totalPoints(0);
    }
$('.functionButton').prop('disabled', true);
}

function getTrue(button){
var getTrufalAns1 = button.id;

    if (getTrufalAns1 == getTrufal){
    var getPoInt = parseInt(getPo);
        $('.hiddenPoints').html(getPoInt);
        totalPoints(getPoInt);
    }
    else{
        $('.hiddenPoints').html(0);
        totalPoints(0);
    }
$('.functionButton').prop('disabled', true);
}
</script>

<script>
function getAnswer(index){
var getInputAns = $("#answerInput" + index).val();

    if (getInputAns == getShorAns){
    var getPoInt = parseInt(getPo);
        $('.hiddenPoints').html(getPoInt);
        totalPoints(getPoInt);
    }
    else {
        $('.hiddenPoints').html(0);
        totalPoints(0);
    }
$('.functionButton').prop('disabled', true);
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

    var wrong = $(".hiddenPoints").text();

      console.log("wrong val " + wrong);
      if (wrong == 0){
        $('#openModalWrong').modal('show');
        setTimeout(function() {
            $('#openModalWrong').modal('hide');
            loopBox();
        }, 5000);
      }
      else {
        $('#openModal').modal('show');
        setTimeout(function() {
            $('#openModal').modal('hide');
            loopBox();
        }, 5000);
      }
       
  clearInterval(downloadTimer);
  document.getElementById("seconds").innerHTML = ""
  }
}, 1000);
$('.hiddenPoints').html(0);
$('.functionButton').prop('disabled', false);
}
</script>

<script>

function loopBox() {
var currentQ;
var qS = $("#box").children(".question");
//console.log("qS: " + qS);
//console.log("qSsize: " + qS.length);
qS.each(function(index){
  var q = $(this);
  //console.log("q: " + q);
  //console.log("qid: " + q.attr('id'));
      if(!$(this).hasClass("d-none")) {
          //console.log("no hidden");
          currentQ =  $(this).attr("id");
        }
        var a = $(this).addClass("d-none");

});
console.log("currentQ: " + currentQ);
            currentQ = currentQ.replace('q', '');
            var nextQ = parseInt(currentQ) + 1;
            //console.log("nextQ: " + nextQ);
            var c = "q" + nextQ;
            //console.log("c: " + c);
            $("#q" + nextQ).removeClass("d-none");
            timeleft = $('#value' + nextQ).val();
            getAns = $('#right_answer' + nextQ).val();
            getPo = $('#points' + nextQ).val();
            getTrufal = $('#true_false' + nextQ).val();
            getShorAns = $('#short_answer' + nextQ).val();
            getInputAns = $('#answerInput' + nextQ).val();
            timerCount();
}
</script>
@endsection
