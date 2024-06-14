<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalNewCustomer = Customer::where('status', 'NEW CUSTOMER')->count();
        $totalLoyalCustomer = Customer::where('status', 'LOYAL CUSTOMER')->count();

        return view('dashboard', compact('totalNewCustomer', 'totalLoyalCustomer'));
    }
}
