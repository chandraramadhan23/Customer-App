<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    public function index() {
        return view('customer');
    }

    public function showCustomers() {
        $customers = Customer::all();

        return Datatables::of($customers)->make(true);
    }

    public function addCustomer(Request $request) {
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }
}