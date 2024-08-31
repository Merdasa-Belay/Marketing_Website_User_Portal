<?php

namespace App\Http\Controllers;

use App\Models\Customer;


use Illuminate\Http\Request;
use App\Service\CustomerServices;

class CustomerController extends Controller
{
    public function registration()
    {


        return view('register');
    }
    public function login_page()
    {
        return view('customer_login');
    }



    public function index()
    {



        $customer = Customer::all();
        return view('my_detail', compact('customer'));
    }



    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        //
        // Validate the input
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required',





        ]);

        // Create a new product
        $customer = Customer::create($request->all());
        // redirect the user and send friendly message

        if ($customer) {
            return redirect('my_detail');
        }
        return 'customer-login';
    }




    // Update user profile

    public function update(Request $request, Customer $customer)
    {
        // Validation
        $request->validate([
            'title' => 'required',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Prepare data for update
        $updateData = $request->only(['title', 'name', 'country', 'phone', 'email']);

        // If a new password is provided, hash it before saving
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Update the customer
        $customer->update($updateData);

        // Redirect to the 'my-detail' route with a success message
        return redirect()->route('my-detail')->with([
            'success' => 'Details updated successfully!',
            'title' => 'My detail'
        ]);
    }




    public function myDashboard()
    {
        $title = 'My Dashboard';
        $customer = Customer::all();


        return view('my_dashboard', compact('title', 'customer'));
    }



    public function myReports()
    {
        $title = 'My Reports';
        $customer = Customer::all();


        return view('my_reports', compact('title', 'customer'));
    }


    public function myDatasets()
    {
        $title = 'My Datasets';
        $customer = Customer::first();


        return view('my_datasets', compact('title', 'customer'));
    }
}
