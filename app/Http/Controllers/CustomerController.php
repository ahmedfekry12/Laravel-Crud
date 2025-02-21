<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $customers = Customer::all();
        $customers = Customer::when($request->has('search'), function ($query) use ($request){
            $query->where('first_name' , 'LIKE' , "%$request->search%")
            ->orWhere('last_name' , 'LIKE' , "%$request->search%")
            ->orWhere('email' , 'LIKE' , "%$request->search%")
            ->orWhere('phone' , 'LIKE' , "%$request->search%")
            ->orWhere('bank_account' , 'LIKE' , "%$request->search%")
            ->orWhere('about' , 'LIKE' , "%$request->search%");
        })->orderBy('id' , $request->has('order') ? $request->order : 'DESC')->get();
        return view('customers.index' , compact('customers'));
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
    public function store(CustomerStoreRequest $request)
    {
        // dd($request->all());

        $customer = new Customer();

        if ($request->hasFile('file')) {
            $img = $request->file('file')->store('/' , 'public_customer');

            $filePath = '/uploads/' . $img;
            $customer->file = $filePath;

            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->bank_account = $request->bank_account;
            $customer->about = $request->about;
            $customer->save();
        }

        return to_route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show' , compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit' , compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        if ($request->hasFile('file')) {
            
            // delete prev img
            File::delete(public_path($customer->file));

            // upload new img
            $img = $request->file('file')->store('/' , 'public_customer');

            $filePath = '/uploads/' . $img;
            $customer->file = $filePath;

            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->bank_account = $request->bank_account;
            $customer->about = $request->about;
            $customer->save();
        }

        return to_route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $customer = Customer::findOrFail($id);
        // File::delete(public_path($customer->file));
        $customer->delete();

        return to_route('customers.index');
    }

    public function softdelete(Request $request)
    {
        $customers = Customer::when($request->has('search'), function ($query) use ($request){
            $query->where('first_name' , 'LIKE' , "%$request->search%")
            ->orWhere('last_name' , 'LIKE' , "%$request->search%")
            ->orWhere('email' , 'LIKE' , "%$request->search%")
            ->orWhere('phone' , 'LIKE' , "%$request->search%")
            ->orWhere('bank_account' , 'LIKE' , "%$request->search%")
            ->orWhere('about' , 'LIKE' , "%$request->search%");
        })->orderBy('id' , $request->has('order') ? $request->order : 'DESC')->onlyTrashed()->get();
        return view('customers.trash' , compact('customers'));
    }

    public function restore($id)
    {
        Customer::withTrashed()->where('id' , $id)->restore();
        return to_route('customers.index');
    }
    
    public function forceDestroy($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        File::delete(public_path($customer->file));
        $customer->forceDelete();
        return to_route('customers.index');
    }
}
