<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Referral;
use App\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function referral()
    {
        $referral = Referral::all();
        foreach ($referral as $item){
          $user =   User::where('id', $item->user_id)->get();
            $item['users'] = $user;
        }
        return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $referral],200);

    }
}
