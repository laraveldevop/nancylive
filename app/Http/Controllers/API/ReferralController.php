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
        $v = [];
        $referral = Referral::select(DB::raw('users.*,referral.status,referral.user_id'))->leftjoin('users','referral.referral_code','=','users.referral_code')->get();
        $user = $referral->unique('referral_code');
        $user->all();
        foreach ($referral as $item){
          $users =   User::select('id')->where('id', $item->user_id)->get();
            array_push($v,$users);
            $user['users'] = $v;
        }

        return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $user],200);

    }
}
