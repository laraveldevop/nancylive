<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Referral;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
{
    public function referral()
    {
        $referral = Referral::select(DB::raw('users.*,referral.status,referral.user_id'))->leftjoin('users','referral.referral_code','=','users.referral_code')->get();
        foreach ($referral as $item){
          $user =   User::where('id', $item->user_id)->get();
            $item['users'] = $user;
        }
        return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $referral],200);

    }
}
