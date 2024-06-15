<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Jobs\LoyalCustomerJob;
use App\Jobs\NewCustomerJob;
use App\Mail\LoyalCustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('customer', compact('user'));
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

    public function showEdit($id) {
        $user = Customer::where('id', $id)->first();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'status' => $user->status,
        ]);
    }

    public function edit(Request $request, $id) {
        Customer::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        if ($request->status == 'LOYAL CUSTOMER') {
            LoyalCustomerJob::dispatch($request->email);
        }
    }


    public function delete($id) {
        Customer::find($id)->delete();
    }
}