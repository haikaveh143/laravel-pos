<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers', compact('customers'));
    }

    public function create()
    {
        return view('customers.form', [
            'customer' => new Customer(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['nullable'],
        ]);

        Customer::create($validated);

        return redirect()->route('customers')
            ->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.form', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['nullable'],
        ]);

        $customer->update($validated);

        return redirect()->route('customers')
            ->with('success', 'Customer updated successfully.');
    }
}