<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::all();

        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $package]);

    }
}
