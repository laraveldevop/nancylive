<?php

namespace App\Http\Controllers;

use App\Referral;
use App\ReferralHistory;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_all= Referral::where('stat',1)->leftJoin('users','referral.referral_code','=','users.referral_code')->orderBy('referral.id','desc')->get();
        $user = $user_all->unique('id');
        $user->all();

        return view('container.download.index')->with(compact('user'));

    }

    public function viewReferral(Request $request){
        if ($request->ajax()) {
            $data= $request->data;
            $order = Referral::where('referral.referral_code',$data)->join('users','referral.user_id','=','users.id')->get();
            $setting= Setting::first();
            $tot = 0;

            $output = '';
            $output .= '';

            foreach ($order as $item) {
                $output .= '<tr>';
                $output .= '<td>' . $item->name . '</td>';
                $output .= '<td>' . $item->business_name . '</td>';
                $output .= '<td>' . $item->mobile . '</td>';
                $output .= '<td>' . $item->email . '</td>';
                $output .= '<td>' . $item->address . '</td>';
                $output .= '<td>' . $item->city . '</td>';
                $output .= '<td>' . $setting->download . '</td>';
                $output .= '</tr>';
                $tot += $setting->download;
            }
            $output .= '<tr>';
            $output .= ' <td colspan="6">total</td>';
            $output .= '<td>' . $tot . '</td>';
            $output .= '</tr>';
            return response()->json($output);
        }
    }

    public function UpdateReferralStatus(Request $request)
    {
        if ($request->ajax()) {
            $data= $request->referral_code;
            $status= $request->status;

            $order = Referral::where('referral_code',$data)->get();
            foreach ($order as $key=>$item){
                $referral = new ReferralHistory();
                $referral->stat = 1;
                $referral->status = $status;
                $referral->user_id = $item->user_id;
                $referral->referral_code = $item->referral_code;
                $referral->save();
            }
            DB::table('referral')->where('referral_code', '=', $data)->delete();
            return response()->json($order);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
