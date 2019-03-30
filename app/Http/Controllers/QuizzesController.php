<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\User;
use App\Question;
use Keygen;

class QuizzesController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('quiz.index')->with('quizzes', $user->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
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
            'title'=>'required',
            'category'=> 'required',
            'description' => 'required',
        ]);

        //create quiz
        $quiz = new Quiz;
        $quiz ->title = $request -> input('title');
        $quiz ->category = $request -> input('category');
        $quiz ->description = $request -> input('description');

        $quiz->game_pin = $random = Keygen::numeric(5)->prefix(mt_rand(1,9))->generate(true);
        $quiz->user_id = auth()->user()->id;
        $quiz ->save();

        return redirect('/quizzes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);

        $questions = DB::table('questions')->where('quiz_id', '=', $id)->paginate(10);
        return view('quiz.show')->with('quiz', $quiz)->with('questions',$questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);

        //check for correct user
        if(auth()->user()->id !==$quiz->user_id)
        {
            return redirect('/quizzes')->with('error', 'Unauthorized Page');
        }

        return view('quiz.edit')->with('quiz', $quiz);
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
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
        // Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    }

        // Create Post
        $quiz = Quiz::find($id);
        $quiz->title = $request->input('title');
        $quiz->category = $request->input('category');
        if($request->hasFile('cover_image')){
            $quiz->cover_image = $fileNameToStore;
        }
        $quiz->save();

        return redirect('/quizzes')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        //check for correct user
        if(auth()->user()->id !==$quiz->user_id)
        {
            return redirect('/quizzes')->with('error', 'Unauthorized Page');
        }
        $quiz-> delete();

        return redirect('/quizzes')->with('success', 'Post Removed');
    }
}
