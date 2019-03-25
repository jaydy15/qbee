<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
<<<<<<< HEAD
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">


=======
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://bootswatch.com/4/superhero/bootstrap.min.css" rel="stylesheet"> --}}
    {{--  <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">  --}}
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{--  <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">  --}}
>>>>>>> 5bf0049994ad8ffa2e0f5bb7e9245d0fee72cbd4
</head>
<body>

    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

</body>
<script>
function getQuizID(id) {
    document.getElementById("try").innerHTML = id;
}
</script>
</html>
