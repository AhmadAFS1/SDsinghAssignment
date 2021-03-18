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
        $QuoteHistory -> Suggested_Price = $req -> Price;
        $QuoteHistory -> Due = ($req -> Gallons) * ($req -> Price);
        $QuoteHistory -> save();
        response(['created'=>true], 201);
        return redirect('fuelquoteform');
    }
}
