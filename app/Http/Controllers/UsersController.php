<?php

namespace App\Http\Controllers;

use App\SubRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
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
        $user=  User::with('roles')->leftJoin('sub_role','users.sub_role_id','=','sub_role.role_id')->get();

//         $value =$user->roles->first();
//       echo $user;die();
        $sub_role= SubRole::all();
        return view('container.users.index')->with(compact('user','sub_role'));

    }

    public function updateRole(Request $request)
    {
        if ($request->ajax()) {
            $role_id= $request->data;
            $id= $request->user_id;
            if ($role_id == 1) {
                $array = [1, 2, 3, 4, 5];
                foreach ($array as $item) {
                    DB::table('role_user')
                        ->updateOrInsert(
                            ['role_id' => $item, 'user_id' => $id],
                            ['role_id' => $item, 'user_id' => $id]
                        );
                }
            }
            if ($role_id == 2){
                $array = [2,5];
                DB::table('role_user')->where('user_id', $id)->delete();
                foreach ($array as $item) {
                    DB::table('role_user')
                        ->updateOrInsert(
                            ['role_id' => $item, 'user_id' => $id],
                            ['role_id' => $item, 'user_id' => $id]
                        );
                }
            }
            if ($role_id == 3){
                $array = [3,5];
                DB::table('role_user')->where('user_id', $id)->delete();
                foreach ($array as $item) {
                    DB::table('role_user')
                        ->updateOrInsert(
                            ['role_id' => $item, 'user_id' => $id],
                            ['role_id' => $item, 'user_id' => $id]
                        );
                }
            }
            if ($role_id == 4){
                $array = [4,5];
                DB::table('role_user')->where('user_id', $id)->delete();
                foreach ($array as $item) {
                    DB::table('role_user')
                        ->updateOrInsert(
                            ['role_id' => $item, 'user_id' => $id],
                            ['role_id' => $item, 'user_id' => $id]
                        );
                }
            }
            return response()->json($role_id);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
