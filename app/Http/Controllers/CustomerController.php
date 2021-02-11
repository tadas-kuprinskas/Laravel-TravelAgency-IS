<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if(isset($request->country_id) && $request->country_id !== 0)
            $customers = \App\Models\Customer::where('country_id', $request->country_id)->orderBy('surname')->get();
        else
            $customers = \App\Models\Customer::orderBy('surname')->get();
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('customer.index', ['customers' => $customers, 'countries' => $countries]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('customer.create', ['countries' => $countries]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
        ]);

        $customer = new Customer();
        // can be used for seeing the insides of the incoming request
        // dd($request->all());;
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customer.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer){
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('customer.edit', ['customer' => $customer, 'countries' => $countries]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Customer $customer){
        
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
        ]);

        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Request $request)
    {
        $customer->delete();
        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl . http_build_query(['country_id'=> $request->input('country_id')]));
        // return redirect()->route('customer.index', ['country_id'=> $request->input('country_id')]);
    }

    public function travel($id){
        $customer = Customer::find($id);
        return view('customer.travel', ['customer' => $customer]);
    }


}
