<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DataTables;
// use Yajra\Dataables\Dataables;

class CustomerController extends Controller
{
    public function index() {
        return view('customer');
    }

    public function showCustomer() {
        $customers = Customer::all();

        return Datatables::of($customers)->make(true);
    }
}