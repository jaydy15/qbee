@extends('layout.app')

@section('content')
<div class="container">
    <h3>Welcome to MyQbee {{auth()->user()->name}}</h3>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="panel-body">
                    <a href="/quizzes/create" class="btn btn-info">Create Quiz</a>
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
                                    <td><a href="/quizzes/{{$quiz->id}}/show" class="btn btn-secondary">Show</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['QuizzesController@destroy', $quiz->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
