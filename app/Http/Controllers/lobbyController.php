<?php

namespace App\Http\Controllers;
use App\Quiz;
use Illuminate\Http\Request;
use Keygen;

class lobbyController extends Controller
{
    public function index()
    {
        $random = Keygen::numeric(8)->prefix(mt_rand(1,9))->generate(true);

        $quiz = new Quiz();
        $quiz->game_pin = $random;
        return view('lobby.index')->with('random', $random);
    }
}
