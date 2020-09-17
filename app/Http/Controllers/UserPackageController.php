<?php

namespace App\Http\Controllers;

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
            ->select(DB::raw('user_package.id,user_package.user_id,user_package.package_id,users.image,users.mobile,users.name as u_name,package.name,package.price'))
            ->leftJoin('users','user_package.user_id','=','users.id')
            ->leftJoin('package','user_package.package_id','=','package.id')
            ->orderBy('user_package.id','desc')
            ->get();
        return view('container.user_package.index')->with(compact('userPackage'));

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
