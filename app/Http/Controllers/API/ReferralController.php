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
        $v=[];
//        $referral = Referral::select(DB::raw('users.*,referral.status,referral.referral_code as referral'))->leftjoin('users','referral.referral_code','=','users.referral_code')->get();
//        $user = $referral->unique('referral_code');
//        $user =  Referral::groupBy('referral_code')->get();
        $user = Referral::query()->leftJoin('users', 'referral.referral_code', '=', 'users.referral_code')
            ->select(DB::raw('users.*,referral.status,referral.referral_code as referral'))
            ->groupby('referral.referral_code')
            ->get();
        foreach ($user  as $value) {
            $ref = DB::table('referral')->select(DB::raw('users.*'))->leftjoin('users','referral.user_id','=','users.id')->where('referral.referral_code','=',$value->referral_code)->get();
            $value['user'] = $ref;
        }

        return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $user],200);

    }
}
