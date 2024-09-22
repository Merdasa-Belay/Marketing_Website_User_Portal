<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest; // Ensure to import your CustomerRequest
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $customer = Customer::create([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        return redirect()->route('customers.show', ['customer' => $customer->id])
            ->with('success', 'Customer created successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $title = 'detail';

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
            'newpassword' => 'required|min:8|confirmed', // ensures newpassword and confirmpassword match
        ]);

        // Find the customer
        $customer = Customer::findOrFail($id);

        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, $customer->password)) {
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
