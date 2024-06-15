<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $totalNewCustomer = Customer::where('status', 'NEW CUSTOMER')->count();
        $totalLoyalCustomer = Customer::where('status', 'LOYAL CUSTOMER')->count();
        $user = Auth::user();
        $totalUser = User::count();

        return view('dashboard', compact('totalNewCustomer', 'totalLoyalCustomer', 'totalUser', 'user'));
    }
}
