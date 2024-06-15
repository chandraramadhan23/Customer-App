<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalNewCustomer = Customer::where('status', 'NEW CUSTOMER')->count();
        $totalLoyalCustomer = Customer::where('status', 'LOYAL CUSTOMER')->count();
        $totalUser = User::count();

        return view('dashboard', compact('totalNewCustomer', 'totalLoyalCustomer', 'totalUser'));
    }
}
