<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Quiz;
use App\User;


class QuestionsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        $quiz = Quiz::find($quiz_id);

        return view('question.index')->with('questions', $user->questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user_id = auth()->user()->id;
        $quizzes = DB::table('quizzes')->where('user_id', '=', $user_id)->get();
        return view('question.create')->with('quizzes', $quizzes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $this-> validate($request, [
            'question'=>'required',
            'question_type'=> 'required',
            'points' => 'required',
            'time_limit' => 'required',
        ]);

        //create question
        $question = new Question;
        $question ->question = $request -> input('question');
        $question ->question_type = $request -> input('question_type');
        $question ->points = $request -> input('points');
        $question ->time_limit = $request -> input('time_limit');

        $question ->choice1 = $request -> input('choice1');
        $question ->choice2 = $request -> input('choice2');
        $question ->choice3 = $request -> input('choice3');
        $question ->choice4 = $request -> input('choice4');

        $question ->true_false = $request -> input('true_false');

        $question ->short_answer = $request -> input('short_answer');

        $question ->user_id = auth()->user()->id;

        $quiz = Quiz::find($id);
        $question ->quiz_id = $quiz ->id;
        //$question->quiz_id = $id;

        $question ->save();

        return redirect("/quizzes/{$id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($request->question_id);
        $question->update($request->all());
        return redirect("/quizzes/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        //check for correct user

        $question-> delete();
        
        return back()->with('success', 'Post Removed');
    }

    public function getIdEdit($id)
    {
        $question = Question::find($id);

        return view('question.form')->with('questions', $question);
    }
}
