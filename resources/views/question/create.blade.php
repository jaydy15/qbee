
    <h1>Create Question</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method'=>'POST', 'enctype'=>'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('question','Question')}}
            {{Form::text('question','',['class'=> 'form-control', 'placeholder' => 'Question'])}}
        </div>

        <div class="form-group">
            {{Form::label('question_type','Question Type')}}
            {{Form::select('question_type',
            ['mc' => 'Multiple Choice',
            'tf' => 'True or False',
            'shan' => 'Short Answer',

            ],


            null, ['class'=> 'form-control' ,'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('points','Points')}}
            {{Form::text('points','',['class'=> 'form-control', 'placeholder' => 'Points'])}}
        </div>

        <div class="form-group">
            {{Form::label('time_limit','Time Limit')}}
            {{Form::text('time_limit','',['class'=> 'form-control', 'placeholder' => 'Time Limit'])}}
        </div>



        
    {!! Form::close() !!}

