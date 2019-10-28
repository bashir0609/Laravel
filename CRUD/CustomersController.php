<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = Customer::all();

        return view('customers.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            ]);
        Customer::create($data);
        
        return back()->with('status', 'Customer Added Successfully!');
    }

}
