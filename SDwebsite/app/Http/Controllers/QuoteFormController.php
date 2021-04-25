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
        if($user != NULL)
        {
            $address = ($user->address1);
            $city = ($user->city);
            $state = ($user->state);
            $zip = ($user->zipcode);
            $fulladdress = $address." ".$city.", ".$state." ".$zip;
        }
        else {
            $fulladdress = "No address given!\nUsing Texas Price ($2) as default";
        }


        $QuoteHistory = new QuoteHistory;
        
        $QuoteHistory -> Gallons = $req -> Gallons;
        $QuoteHistory -> Address = $fulladdress;
        $QuoteHistory -> start = $req -> start;
        $QuoteHistory -> user_id = $user -> id;
        $QuoteHistory -> Suggested_Price = $req -> Price;
        $QuoteHistory -> Due = ($req -> Gallons) * ($QuoteHistory -> Suggested_Price);
        $QuoteHistory -> save();
        response(['created'=>true], 201);
        return redirect('home');
    }
}
