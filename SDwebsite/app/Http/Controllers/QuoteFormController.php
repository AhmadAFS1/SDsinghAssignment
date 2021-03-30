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
        
<<<<<<< HEAD
=======
        if(empty($address) || empty($city) || empty($state) || empty($zip))
        {
            $fulladdress = "Full address not given!"; //"Full address not given!\nUsing Texas Price ($5) as default";
            $QuoteHistory -> Suggested_Price = 5.00; //implement the price controller here
                                                    //maybe put due in here and not using an if
        }
        else if($state == "TX")
        {
            $QuoteHistory -> Suggested_Price = 2.00; //and here
        }
        else
        {
            $QuoteHistory -> Suggested_Price = 3.00; //and here
        }
        
>>>>>>> 34fd5361a2d1a0dd3c361025b1cb3fc6aad8d68e
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
