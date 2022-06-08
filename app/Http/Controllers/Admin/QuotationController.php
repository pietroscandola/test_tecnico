<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quotation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::all();
        return view('admin.quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotation = new Quotation();
        return view('admin.quotations.create', compact('quotation'));
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
            'price' => ['required', 'numeric'],
            'description' => ['string', 'min:10']
        ]);

        $data = $request->all();
        $offer = new Quotation();
        $offer->fill($data);
        $offer->save();

        return redirect()->route('admin.quotations.index');
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return view('admin.quotations.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        return view('admin.quotations.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quotation = Quotation::findOrFail($id);

        $request->validate([
            'price' => ['required', 'numeric'],
            'description' => ['string', 'min:10']
        ]);

        $data = $request->all();
        $quotation->update($data);

        return redirect()->route('admin.quotations.show', $quotation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();
        return redirect()->route('admin.quotations.index');
    }
}
