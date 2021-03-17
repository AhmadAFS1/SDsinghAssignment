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
        $QuoteHistory -> City = $req -> City;
        $QuoteHistory -> Due = $req -> Due;
        $QuoteHistory -> save();
        return redirect('fuelquoteform');
    }
}
