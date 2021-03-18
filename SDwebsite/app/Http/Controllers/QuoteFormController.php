<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteHistory;

class QuoteFormController extends Controller
{
    //
    //$user =  auth()->user();
    function addHistory(Request $req)
    {   
        //$user =  auth()->user();
        $QuoteHistory = new QuoteHistory;
        $QuoteHistory -> Gallons = $req -> Gallons;
        $QuoteHistory -> Address = auth()->user()->address1;//Address = $req -> Address;
        $QuoteHistory -> start = $req -> start;
        $QuoteHistory -> City = $req -> City;
        $QuoteHistory -> Due = $req -> Due;
        $QuoteHistory -> save();
        return redirect('fuelquoteform');
    }
}
