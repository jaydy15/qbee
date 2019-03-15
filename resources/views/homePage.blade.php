@extends('layout.app')

@section('content')
<div class="container">
    @if (Auth::guest())
              dito ung main home page
          @else
            <ul class="nav navbar-nav nav-right">
            <h3>Welcome to MyQbee {{auth()->user()->name}}</h3>
                <div>Enter game pin here: 
                    <input type="text" id="pin" value="">
                    <button type="button" onclick="enterPin();">Enter</button>
                </div>
            </ul>
          @endif
</div>

<script>
function enterPin() {
    var x= document.getElementById("pin").value;
    
    if (x=="1"){
        location.replace("/lobby");

    }
}
</script>
@endsection