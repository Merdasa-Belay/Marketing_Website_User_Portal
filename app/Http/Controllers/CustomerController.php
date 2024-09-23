<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest; // Ensure to import your CustomerRequest
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $title = 'Customers';
        return view('customers.index', compact('customers', 'title'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CustomerRequest $request)
    {
        // Creating a new customer
        $customer = Customer::create([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Automatically log the customer in
        Auth::login($customer);

        // Redirect to the login page
        return redirect()->route('login.show') // Change to your login route name
            ->with('success', 'Registration successful! You are now logged in.');
    }





    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $title = 'detail';
        $customer = Customer::findOrFail($customer->id);
        return view('customers.detail', compact('customer', 'title'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Customer';

        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        return redirect()->route('customers.show', ['customer' => $customer->id])
            ->with('success', 'Customer updated successfully!');
    }

    public function updatePassword(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ]);

        // Find the customer
        $customer = Customer::findOrFail($id);

        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, $customer->password)) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['currentpassword' => 'Current password is incorrect.']);
        }

        // Update the password
        $customer->password = Hash::make($request->newpassword);
        $customer->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }






    public function myDashboard(Customer $customer)
    {
        $title = 'Dashboard';
        return view('customers.dashboard', compact('customer', 'title'));
    }

    public function myDataset(string $id)
    {
        $customer = Customer::findOrFail($id);
        $title = 'Customer';

        return view('customers.dataset', compact('customer', 'title'));
    }

    public function myReport(string $id)
    {
        $customer = Customer::findOrFail($id);
        $title = 'Customers';
        return view('customers.report', compact('customer', 'title'));
    }
}
