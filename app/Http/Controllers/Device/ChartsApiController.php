<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ChartsApiController extends Controller
{
    public function index()
    {
        $elecUsages = DB::table('elec_usage')
        ->select('power','time')
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->take(1)
        ->get();
        $labels = $elecUsages->pluck('time');
        $data = $elecUsages->pluck('power');

        return response()->json(compact('labels', 'data'));
    }

    public function guagechart()
    {
        $elecUsages = DB::table('elec_usage')
        ->select('voltage','time')
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->take(1)
        ->get();
        $labels1 = $elecUsages->pluck('time');
        $data1 = $elecUsages->pluck('voltage');

        return response()->json(compact('labels1', 'data1'));
    }

    
}