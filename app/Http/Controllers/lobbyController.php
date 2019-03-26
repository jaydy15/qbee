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
        $quizzes ->game_pin = $request -> input('game_pin');
        $game_pin = DB::table('quizzes')->where('game_pin', '=', $quizzes)->get();
        return view('lobby.question')->with('game_pin',$game_pin);
    }
}
