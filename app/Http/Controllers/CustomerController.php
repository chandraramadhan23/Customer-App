<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Jobs\NewCustomerJob;
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

        NewCustomerJob::dispatch(
            $request->email,
        );

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }
}