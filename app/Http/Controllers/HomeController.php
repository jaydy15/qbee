<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\User;
use App\Game;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('quizzes', $user->posts);
    }

    public function joinedquiz()
    {
        try{
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

    //get date
        $games = DB::table('games')->where('user_id', '=', $user_id)->get();

    //get quiz
        $quizid = DB::table('games')->select('quiz_id')->where('user_id','=',$user_id)->get();
        $quiz_id =  $quizid->implode('quiz_id',',');
        $id = json_decode(($quiz_id), true);
        
        $quizzes = DB::table('quizzes')->where('id','=' ,$id)->get();

    // //get na
    //     $getname = DB::table('quizzes')->select('user_id')->where('id','=' ,$quiz_id)->get();
    //     $nameid =  json_decode(json_encode($getname), true); 
    //     $names = DB::table('users')->where('id','=',$nameid)->get();
        
        }
        catch(\Exception $e)
        {
            return redirect('home')->with('error', 'No history yet');
        }

        return view('profile.quizhis')->with('quizzes', $user->posts)->with('games',$games)->with('quizzes',$quizzes)->with('quizid',$quizid)->with('quiz_id',$quiz_id)->with('id',$id);
    }
}
