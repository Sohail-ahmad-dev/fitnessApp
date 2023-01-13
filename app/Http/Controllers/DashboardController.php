<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function usersRecord()
    {
        $users = User::where('role', 0)->get();
        return view('admin.users_record',compact('users'));
    }
    public function updateStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['status' => 'success']);
    }
}
