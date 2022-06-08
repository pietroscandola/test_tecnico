<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('name', 'DESC')->get();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::where('id', $id)->first();
        if (!$customer) return response('Customer Not Found', 404);
        return response()->json($customer);
    }
}
