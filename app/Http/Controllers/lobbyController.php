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
}
