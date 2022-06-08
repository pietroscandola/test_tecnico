<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('name', 'DESC')->get();
        return response()->json($offers);
    }

    public function show($id)
    {
        $offer = Offer::where('id', $id)->first();
        if (!$offer) return response('Offer Not Found', 404);
        return response()->json($offer);
    }
}
