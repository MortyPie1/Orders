<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class HistoryController extends Controller
{
    public function index(){
        $history = History::with('order:id,name')->get();
        if($history->isEmpty()){
            return response()->json(['message'=>'No data found'],Response::HTTP_NOT_FOUND);
        }
        return $history;
    }
}
