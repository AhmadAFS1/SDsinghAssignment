<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteHistory;

class QuoteFormController extends Controller
{
    
    function addHistory(Request $req)
    {   
        $user =  auth()->user();
        try 
        {
            $address = ($user->address1);
            $city = ($user->city);
            $state = ($user->state);
            $zip = ($user->zipcode);
            $fulladdress = $address." ".$city.", ".$state." ".$zip;
        }
        catch (exception $e) {
            $fulladdress = "No address given!\nUsing Texas Price ($5) as default";
        }

        $QuoteHistory = new QuoteHistory;
        
        $QuoteHistory -> Gallons = $req -> Gallons;
        $QuoteHistory -> Address = $fulladdress;
        $QuoteHistory -> start = $req -> start;
        $QuoteHistory -> user_id = $user -> id;
        $QuoteHistory -> Suggested_Price = $req -> Price;
        $QuoteHistory -> Due = ($req -> Gallons) * ($QuoteHistory -> Suggested_Price/*$req -> Price*/);
        $QuoteHistory -> save();
        //view('fuelquoteform', ['sugPr' => $QuoteHistory -> Suggested_Price]);
        response(['created'=>true], 201);
        return redirect('home');
    }
}
