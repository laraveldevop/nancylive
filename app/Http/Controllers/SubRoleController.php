<?php

namespace App\Http\Controllers;

use App\SubRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubRoleController extends Controller
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
        $subRole = SubRole::all();
        return view('container.sub_role.index')->with(compact('subRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.sub_role.create')->with('action', 'INSERT');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required'],
        ]);

        $news = $request->input('role');
//        $new = explode('', $news);
//        echo $news; die();
       foreach ($news as $item){
           $subRole = new SubRole();
           $subRole->role = $item;
           $subRole->save();
       }
        return redirect('sub-role');



    }
    public function updateRole(Request $request)
    {
        if ($request->ajax()) {
            $role_id = $request->role_id;
            $id = $request->user_id;
            $users= User::find($id);
            $users->sub_role_id = $role_id;
            $users->save();

        }
        return response()->json('add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubRole  $subRole
     * @return \Illuminate\Http\Response
     */
    public function show(SubRole $subRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubRole  $subRole
     * @return \Illuminate\Http\Response
     */
    public function edit(SubRole $subRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubRole  $subRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubRole $subRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubRole  $subRole
     * @return \Illuminate\Http\Response
     */
    public function destroy($subRole, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
           User::where('sub_role_id', $subRole)->update(['sub_role_id' => null]);
            SubRole::destroy($subRole);
            return redirect('sub-role')->with('message', 'Delete Successfully');

        }
        return redirect('sub-role')->with('delete', 'Password Not Valid');

    }
}
