<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Game;
use Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function getExport(){
        $export = Game::all();
        return Excel::create('Export Data',function($excel) use($export){
            $excel->sheet('Sheet 1',function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->download('xlsx');
    }
}
