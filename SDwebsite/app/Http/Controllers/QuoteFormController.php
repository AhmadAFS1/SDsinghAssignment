<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteHistory;

class QuoteFormController extends Controller
{
    //
    function addHistory(Request $req)
    {
        $QuoteHistory = new QuoteHistory;
        $QuoteHistory -> Gallons = $req -> Gallons;
        $QuoteHistory -> Address = $req -> Address;
        $QuoteHistory -> start = $req -> start;
        $QuoteHistory -> Suggested_Price = $req -> Price;
        $QuoteHistory -> Due = ($req -> Gallons) * ($req -> Price);
        $QuoteHistory -> save();
        response(['created'=>true], 201);
        return redirect('fuelquoteform');
    }
}
