<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function roleUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        $role_id= $request->role_id;
        $sub_role_id= $request->sub_role_id;
        $id= $request->user_id;
        $u = User::find($id);
        if (isset($u)) {
            if ($role_id != null && $sub_role_id == null) {
                if ($role_id == 1) {
                    $array = [1, 2, 3, 4, 5];
                    foreach ($array as $item) {
                        DB::table('role_user')
                            ->updateOrInsert(
                                ['role_id' => $item, 'user_id' => $id],
                                ['role_id' => $item, 'user_id' => $id]
                            );
                    }
                    $user = User::find($id);
                    $user->role_id = 1;
                    $user->save();
                }
                if ($role_id == 2) {
                    $array = [2, 5];
                    DB::table('role_user')->where('user_id', $id)->delete();
                    foreach ($array as $item) {
                        DB::table('role_user')
                            ->updateOrInsert(
                                ['role_id' => $item, 'user_id' => $id],
                                ['role_id' => $item, 'user_id' => $id]
                            );
                    }
                    $user = User::find($id);
                    $user->role_id = 2;
                    $user->save();
                }
                if ($role_id == 3) {
                    $array = [3, 5];
                    DB::table('role_user')->where('user_id', $id)->delete();
                    foreach ($array as $item) {
                        DB::table('role_user')
                            ->updateOrInsert(
                                ['role_id' => $item, 'user_id' => $id],
                                ['role_id' => $item, 'user_id' => $id]
                            );
                    }
                    $user = User::find($id);
                    $user->role_id = 3;
                    $user->save();
                }
                if ($role_id == 4) {
                    $array = [4, 5];
                    DB::table('role_user')->where('user_id', $id)->delete();
                    foreach ($array as $item) {
                        DB::table('role_user')
                            ->updateOrInsert(
                                ['role_id' => $item, 'user_id' => $id],
                                ['role_id' => $item, 'user_id' => $id]
                            );
                    }
                    $user = User::find($id);
                    $user->role_id = 4;
                    $user->save();
                }
                if ($role_id == 0) {
                    DB::table('role_user')->where('user_id', $id)->delete();
                    $user = User::find($id);
                    $user->role_id = null;
                    $user->save();
                }
                return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $user,], 200);
            } elseif ($sub_role_id != null && $role_id == null) {
                $users = User::find($id);
                $users->sub_role_id = $sub_role_id;
                $users->save();
                return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $users,], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Not Valid Role.'], 422);

            }
        }
        else{
            return response()->json(['status' => false, 'message' => 'User Not Found.'], 422);

        }
    }
}
