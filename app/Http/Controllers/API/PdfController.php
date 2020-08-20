<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {
        $pdf = Pdf::all();


        return response()->json(['status'=>true,'message'=>'Document retrieved successfully.' ,'data'=>$pdf->toArray(), ],200);
    }
}
