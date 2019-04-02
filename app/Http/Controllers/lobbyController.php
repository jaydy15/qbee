<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\Question;
use App\Game;use Illuminate\Http\Request;
use Keygen;

class lobbyController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::find($id);
        $questions = DB::table('questions')->where('quiz_id','=', $id);        
        return view('lobby.index')->with('quiz', $quiz);
    }

    public function statusupdate(Request $request, $id){
        $quiz = Quiz::find($id);
        $questions = DB::table('questions')->where('quiz_id', '=', $id)->update(['status'=>1]);
        return view ('lobby.test')->with('quiz', $quiz);

    }

    public function statusupdate0(Request $request, $id){
        
        $questions = DB::table('questions')->where('quiz_id', '=', $id)->update(['status'=>0]);
        return view ('lobby.end');

    }

    public function lobby()
    {
        return view('lobby.wait');
    }


    public function joinquiz(Request $request)
    {
      
            $gamepin = $request->input('game_pin');
            $game_pin = DB::table('quizzes')->select('id')->where('game_pin', '=', $gamepin)->get('id');
            
            if($gamepin == '' )
            {
                return view('lobby.wait');
            }
            $quiz_id = $game_pin->implode('id', ', ');
            $quiztitle = DB::table('quizzes')->select('title')->where('id','=',$quiz_id)->get();
            $quizauthorid = DB::table('quizzes')->select('user_id')->where('id','=',$quiz_id)->get();
            $id = $quizauthorid->implode('user_id','');
            $quizauthor = DB::table('users')->select('name')->where('id','=',$id)->get();
            $questions = DB::table('questions')->where('quiz_id', '=', $quiz_id)->where('status', '=', '1')->get();
            // //saving data to database
                    $game= new Game;
                    $game ->game_pin = $gamepin;
                    $game ->quiz_id = $game_pin->implode('id', ', ');
                    $game ->quiztitle = $quiztitle->implode('title','');
                    $game ->quizauthor = $quizauthor->implode('name','');
                    $game ->user_id = auth()->user()->id;
                    $game->save();
     


        return view('lobby.question')->with('game_pin', $game_pin)->with('questions',$questions)->with('gamepin', $gamepin)->with('quiz_id',$quiz_id)->with('game_pin',$game_pin);
    }
}

