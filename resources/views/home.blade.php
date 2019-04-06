@extends('layout.app')

@section('content')
<div class="container">
    <h3>Welcome to MyQbee {{auth()->user()->name}}</h3>
    
</div>
<div class="container">
    <div class="row">
    <div class="col-3 .col-sm-1">
            <ul class="list-group">
              <li class="list-group-item"><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit Account</a></li>
              <li class="list-group-item"><a href="/quizzes/create" class="btn btn-info">Create Quiz</a></li>
              <li class="list-group-item"><a href="/profile/join" class="btn btn-primary">Quiz History</a></li>
          </ul>
          </div>
          <div class="col-8 .col-sm-3" id='quizzes'>
            
            <h3>Your Quizzes</h3>
            @if(count($quizzes) > 0)
                <table class="table ">
                    <tr class="table-warning">
                        <th>Title</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td>{{$quiz->title}}</td>
                            <td><a href="/quizzes/{{$quiz->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td></td>
                            <td><a href="/quizzes/{{$quiz->id}}" class="btn btn-secondary">View Questions</a></td>
                            <td>
                                {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <example-component></example-component>
            @else
                <p>You have no quiz</p>
            @endif
        </div>
@endsection
