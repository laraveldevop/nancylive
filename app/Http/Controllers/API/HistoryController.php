<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::all();
        return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $history], 200);

    }
}
