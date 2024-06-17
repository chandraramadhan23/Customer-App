<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('user', compact('user'));
    }

    public function showUsers() {
        $users = User::all();

        return Datatables::of($users)->make(true);
    }

    public function addUser(Request $request) {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    }

    public function showEdit($id) {
        $user = User::where('id', $id)->first();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'password' => $user->password,
        ]);
    }

    public function edit(Request $request, $id) {
        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    }


    public function delete($id) {
        User::find($id)->delete();
    }
}
