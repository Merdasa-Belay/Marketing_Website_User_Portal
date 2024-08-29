<?php

namespace App\Http\Controllers;

use App\Models\Customer;


use Illuminate\Http\Request;
use App\Service\CustomerServices;

class CustomerController extends Controller
{
    public function registration()
    {

        $name = 'eyob';
        return view('register', compact('name'));
    }
    public function login_page()
    {
        return view('customer_login');
    }



    public function index()
    {



        $customer = Customer::first();
        return view('customers.index', compact('customers'));
    }



    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {

        $customer = Customer::create([
            'title' => $request->title,
            'name' => $request->name,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'confirmpassword' => $request->confirmpassword
        ]);

        if ($customer) {
            return redirect('my_detail');
        }
        return 'customer_login';
        //
    }



    public function myDetail()
    {
        $customer = Customer::first();
        $title = 'My Details';

        return view('my_detail', compact('customer', 'title'));
    }

    public function myDashboard()
    {
        $title = 'My Dashboard';
        $customer = Customer::first();


        return view('my_dashboard', compact('title', 'customer'));
    }



    public function myReports()
    {
        $title = 'My Reports';
        $customer = Customer::first();


        return view('my_reports', compact('title', 'customer'));
    }


    public function myDatasets()
    {
        $title = 'My Datasets';
        $customer = Customer::first();


        return view('my_datasets', compact('title', 'customer'));
    }



    public function edit(Customer $product)
    {
        //
        return view('customer.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        //
        $request->validate([
            'title' => $request->title,
            'name' => $request->name,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'confirmpassword' => $request->confirmpassword
        ]);
        // Create a new product
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Profile updated succesfully');
    }
}
