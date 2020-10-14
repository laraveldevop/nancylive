<?php

namespace App\Http\Controllers;

use App\Package;
use App\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPackage = DB::table('user_package')
            ->select(DB::raw('user_package.id,user_package.user_id,user_package.package_id,user_package.expire_date,users.image,users.mobile,users.name as u_name,package.name,package.price,user_package.created_at,package.time_method,package.day,package.year,package.month,video.video_name'))
            ->leftJoin('users','user_package.user_id','=','users.id')
            ->leftJoin('package','user_package.package_id','=','package.id')
            ->leftJoin('video','user_package.single_video_id','=','video.id')
            ->orderBy('user_package.id','desc')
            ->get();
        $package= Package::all();
        return view('container.user_package.index')->with(compact('userPackage','package'));

    }

    public function packageList(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->type;
            $package = DB::table('user_package')
                ->select(DB::raw('user_package.id,user_package.user_id,user_package.package_id,users.image,users.mobile,users.name as u_name,package.name,package.price,user_package.created_at,package.time_method,package.day,package.year,package.month'))
                ->leftJoin('users','user_package.user_id','=','users.id')
                ->leftJoin('package','user_package.package_id','=','package.id')
                ->where('package_id',$type)
                ->orderBy('user_package.id','desc')
                ->get();
            $output = '';
            $output .= '';
            foreach ($package as $item) {
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<div class="d-flex">';
                $output .= '<div class="usr-img-frame mr-2 rounded-circle">';
                $output .= '<img alt="avatar" class="img-fluid rounded-circle" src="'.asset(!empty($item->image)?"public/storage/". $item->image:"").'">';
                $output .= ' </div><p class="align-self-center mb-0 admin-name"> ' . $item->u_name . ' </p>';
                $output .= '</div></td>';
                $output .= '<td>' . $item->mobile . '</td>';
                $output .= '<td>' . $item->created_at . '</td>';
                if(!empty($item->year))
                    $output .= '<td>' . date('Y-m-d', strtotime($item->created_at. '+ '.$item->year.' year')) . '</td>';
                elseif (!empty($item->month))
                    $output .= '<td>' . date('Y-m-d', strtotime($item->created_at. '+ '.$item->month.' month')) . '</td>';
                else
                    $output .= '<td>' . date('Y-m-d', strtotime($item->created_at. '+ '.$item->day.' day')) . '</td>';
                $output .= '<td>' . $item->name . '</td>';
                $output .= '</tr>';
            }

            return response()->json($output);
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
     * @param  \App\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function show(UserPackage $userPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPackage $userPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPackage $userPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPackage $userPackage)
    {
        //
    }
}
