<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\SubRole;
use App\User;
use Illuminate\Http\Request;

class SubRoleController extends Controller
{

    public function index()
    {
        $subRole = SubRole::all();
        return response()->json(['status' => true, 'message' => 'Data Get Successfully', 'data' => $subRole]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required'],
        ]);
        $id = $request->input('id');
        if ($id == null) {
            $news = $request->input('role');
            $subRole = new SubRole();
            $subRole->role = $news;
            $subRole->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $subRole]);
        }
        else{
            $subRole = SubRole::find($id);
            $subRole->role = $request->input('role');
            $subRole->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $subRole]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        User::where('sub_role_id', $id)->update(['sub_role_id' => null]);
        SubRole::destroy($id);
        return response()->json(['status' => true, 'message' => 'Delete Successfully', 'data' =>[]]);

    }
}
