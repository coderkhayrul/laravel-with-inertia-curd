<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomerController extends Controller
{

    public function index()
    {
        return Inertia::render('index',[
            'customers' => Customer::all()->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'phone' => $customer->phone,
                ];
            }),
        ]);
    }
    public function create()
    {
        return Inertia::render('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|min:10|max:15',
        ]);

        Customer::create($validated);
        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully.');
    }

    public function edit(Customer $customer): Response
    {
        return Inertia::render('edit',['customer' => $customer]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone' => 'required|min:10|max:15|unique:customers,phone,'.$customer->id,
        ]);

        $customer->update($validated);
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }
}
