<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\Game;
use Illuminate\Http\Request;
use Keygen;

class lobbyController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::find($id);

        
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


    public function store(Request $request, $id){
        $quiz = Quiz::find($id);
        $game= new Game;
        $game->game_pin = $request->input('game_pin');
        $game->user_id = auth()->user()->id;
        $game->quiz_id = $id;

        return view('lobby.in');
    }


    public function joinquiz(Request $request)
    {
        try{
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
