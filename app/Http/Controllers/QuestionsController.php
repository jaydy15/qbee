<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Quiz;


class QuestionsController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $questions = Question::orderby('id','desc')->paginate(10);
        return view('question.index')-> with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        // $question->quiz_id = Quizzes()->id;
        $quiz = Quiz::find($id);
        DB::table('questions')->where('id', $quiz->id)->update(['quiz_id' => $quiez->id]);
        
        // $question->quiz_id = $quiz->id;
        $question ->save();

        return redirect('/questions');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
