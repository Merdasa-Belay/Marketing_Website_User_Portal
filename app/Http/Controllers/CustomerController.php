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

    public function subscriber()
    {
        view('subscriber_dashboard');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('register', compact('customers'));
    }

    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {

        $customer = Customer::create([
            'title' => $request->title,
            'name' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'confirmpassword' => $request->confirmpassword
        ]);

        if ($customer) {
            return redirect('subscriber_dashboard');
        }
        return 'error';
        //
    }
}