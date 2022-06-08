<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;





class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        $offers = Offer::all();
        return view('admin.customers.create', compact('customer', 'offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| string| min:3|unique:customers,name',
            'surname' => ['required', 'string', 'min:3'],
            'phone_number' => ['string', 'required'],
            'email' => ['string', 'required', ''],
            'offers' =>  ['nullable', 'exists:offers,id']
        ]);

        $data = $request->all();
        $customer = new Customer();
        $customer->fill($data);
        $customer->save();
        if (array_key_exists('offers', $data)) {
            $customer->offers()->attach($data['offers']);
        }

        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rsc  $rsc
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $quotations = Quotation::all();
        return view('admin.customers.show', compact('customer', 'quotations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rsc  $rsc
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $offers = Offer::all();
        $customer_offers_ids = $customer->offers->pluck('id')->toArray();
        return view('admin.customers.edit', compact('customer', 'offers', 'customer_offers_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rsc  $rsc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'min:3', Rule::unique('customers')->ignore($customer->id)],
            'surname' => ['required', 'string', 'min:3'],
            'phone_number' => ['string', 'required'],
            'email' => ['string', 'required', Rule::unique('customers')->ignore($customer->id)],
            'offers' =>  ['nullable', 'exists:offers,id']
        ]);
        $data = $request->all();

        $customer->update($data);

        if (!array_key_exists('offers', $data)) {
            $customer->offers()->detach();
        } else {
            $customer->offers()->sync($data['offers']);
        }
        return redirect()->route('admin.customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rsc  $rsc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index');
    }
}
