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
        return view('home')->with('quizzes', $user->posts)->with('user',$user);
    }

    public function joinedquiz()
    {
        try{
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

    //get date
        $games = DB::table('games')->where('user_id', '=', $user_id)->get();

        $quizzes = DB::table('quizzes')->where('user_id', '=', $user_id)->where('status', '=', '1')->get();
        }
        catch(\Exception $e)
        {
            return redirect('home')->with('error', 'No history yet');
        }

        return view('profile.quizhis')->with('games',$games)->with('quizzes',$quizzes);
    }


    public function hostedquiz($id){

        $games = DB::table('games')->where('quiz_id','=',$id)->get();

        return view('profile.hosted')->with('games',$games);

    }
}
