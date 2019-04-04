<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\Question;
use App\Game;
use App\LobbyUser;
use Illuminate\Http\Request;
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
        $questions = DB::table('questions')->where('quiz_id', '=', $id)->get();
        return view ('lobby.test')->with('quiz', $quiz)->with('questions',$questions);

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
            //get quiz id
            $game_pin = DB::table('quizzes')->select('id')->where('game_pin', '=', $gamepin)->get('id');
            if($gamepin == '' )
            {
                return view('lobby.wait');
            }
            $quiz_id = $game_pin->implode('id', ', ');//quiz id #
            $questions = DB::table('questions')->where('quiz_id', '=', $quiz_id)->where('status', '=', '1')->get();
            $lobbyuser = new LobbyUser;
            $lobbyuser ->user_id = auth()->user()->id;
            $lobbyuser ->quiz_id = $quiz_id;
            $lobbyuser ->save();
        return view('lobby.question')->with('questions',$questions)->with('gamepin',$gamepin);
    }

    public function results(Request $request){
        try {
            $gamepin = $request->input('game_pin');
            //get quiz id
            $game_pin = DB::table('quizzes')->select('id')->where('game_pin', '=', $gamepin)->get('id');
            $quiz_id = $game_pin->implode('id', ', ');//quiz id #
            $quiztitle = DB::table('quizzes')->select('title')->where('id','=',$quiz_id)->get();//quiz title
            $quizauthorid = DB::table('quizzes')->select('user_id')->where('id','=',$quiz_id)->get();//quiz user name
            $id = $quizauthorid->implode('user_id','');
            $quizauthor = DB::table('users')->select('name')->where('id','=',$id)->get();
            $questions = DB::table('questions')->where('quiz_id', '=', $quiz_id)->where('status', '=', '1')->get();
            // //saving data to database
                    $game = new Game;
                    $game ->quiz_id = $game_pin->implode('id', ', ');
                    $game ->quiztitle = $quiztitle->implode('title','');
                    $game ->quizauthor = $quizauthor->implode('name','');
                    $game ->user_id = auth()->user()->id;
                    $game ->game_pin = $gamepin;
                    $game ->total_score = $request->input('total_score');
                    $game ->comment = $request->input('comment');
                    $game ->reaction = $request->input('reaction');
                    $game->save();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }


        return redirect('home')->with('success', 'Thank You for Playing');
    }
}

