<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers = Customer::all();
    
		return view('customers.index', compact('customers', 'companies'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer;

        return view('customers.create', compact('companies','customer'));
    }

    public function store()
    {   
        $customer = Customer::create($this->validateRequest());

        // Event and Lisnter for send email;
        event(new NewCustomerHasRegisteredEvent($customer)); 

    	// return redirect('customers');
    }

    public function show(Customer $customer) // Route Model Binding
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'active' => 'required|integer',
            'company_id' => 'required|integer',
        ]);
    }
}
