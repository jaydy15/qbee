<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use Illuminate\Http\Request;
use Keygen;

class lobbyController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::find($id);
        return view('lobby.index')->with('quiz', $quiz);
    }

    public function lobby()
    {
        return view('lobby.wait');
    }


    public function joinquiz(Request $request)
    {
        try{
            session_start();
   
            if( isset( $_SESSION['counter'] ) ) {
               $_SESSION['counter'] += 1;
            }else {
               $_SESSION['counter'] = 1;
            }

            $gamepin = $request->input('game_pin');
            
            $game_pin = DB::table('quizzes')->select('id')->where('game_pin', '=', $gamepin)->get('id');
            if($gamepin == '' ){
                return view('lobby.wait');
            }
            $quiz_id = json_decode(json_encode($game_pin), true);
            $questions = DB::table('questions')->where('quiz_id', '=', $quiz_id)->where('status', '=', '1')->get();
            return view('lobby.question')->with('game_pin', $game_pin)->with('questions',$questions);
        }
        catch(\Exception $e){
            return redirect('/wait')->with('success', 'Lobby not found');
        }
    }
    public function check()
    {
        $check = getMultiple;

        return view('lobby.question')->with('result', $check);
    }
}
