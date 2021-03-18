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
        $address = (auth()->user()->address1);
        $city = (auth()->user()->city);
        $state = (auth()->user()->state);
        $zip = (auth()->user()->zipcode);
        $fulladdress = $address." ".$city.", ".$state." ".$zip;

        $QuoteHistory = new QuoteHistory;
        $QuoteHistory -> Gallons = $req -> Gallons;
        $QuoteHistory -> Address = $fulladdress;
        $QuoteHistory -> start = $req -> start;
        $QuoteHistory -> Suggested_Price = "5" ; //$req -> Price;
        $QuoteHistory -> Due = ($req -> Gallons) * (5/*$req -> Price*/);
        $QuoteHistory -> save();
        response(['created'=>true], 201);
        return redirect('home');
    }
}
