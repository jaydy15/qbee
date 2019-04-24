<?php

namespace App\Exports;

use App\Game;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class gameExport implements FromQuery , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Game::select('name','total_score','created_at','reaction','comment');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Score',
            'Date',
            'Reaction',
            'Comment'
        ];
    }
}
