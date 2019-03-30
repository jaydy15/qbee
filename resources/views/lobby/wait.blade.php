@extends('layout.app')

@section('content')
<h1>Join Quiz</h1>
    {!! Form::open(['action' => 'lobbyController@joinquiz', 'method'=>'PUT', 'enctype'=>'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('game_pin','Game Pin')}}
            {{Form::text('game_pin','',['class'=> 'form-control', 'placeholder' => ''])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
        <!-- <button type="button" onclick="getPin()">Enter</button> -->
    {!! Form::close() !!}

<!-- <script>
function getPin() {
    var enteredPin = document.getElementById("game_pin").value;
    
    jQuery.ajax({
        url: "{{ url('/lobby/joinquiz/enteredPin') }}",
        method: 'post',
        data: {
            game_pin: jQuery('#game_pin').val(),
        },
        success: function(result){
            console.log(result);
            
            if (enteredPin==result) {
                location.replace("/lobby/question");
            }
        }
    });
    
}
</script> -->
@endsection
