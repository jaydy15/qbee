<?php

namespace App\Exports;

use App\Game;
use Maatwebsite\Excel\Concerns\FromCollection;

class gameExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Game::all();
    }
}
