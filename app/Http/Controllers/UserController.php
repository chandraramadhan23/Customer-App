<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index() {
        return view('user');
    }

    public function showUsers() {
        $users = User::all();

        return Datatables::of($users)->make(true);
    }
}
