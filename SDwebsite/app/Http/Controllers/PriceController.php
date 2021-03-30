<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteHistory;

class PriceController extends Controller
{
    function viewPrice(Request $req)
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

        if(empty($address) || empty($city) || empty($state) || empty($zip))
        {
            $fulladdress = "Full address not given!"; //"Full address not given!\nUsing Texas Price ($5) as default";
            $Suggested_Price = 8.00;//implement the price controller here
                                                    //maybe put due in here and not using an if
        }
        else if($state == 'TX')
        {
            $Suggested_Price = 5.00; //and here
        }
        else
        {
            $Suggested_Price = 8.00; //and here
        }

        $Address = $fulladdress;
        //$QuoteHistory -> Suggested_Price = 5 ; //$req -> Price;
        //$Due = ($req -> Gallons) * ($Suggested_Price/*$req -> Price*/);
        
        $QuoteFormData = array($Suggested_Price, $Address);

        return view('fuelquoteform', ['QuoteFormData' => $QuoteFormData]);
        //return view('fuelquoteform')->with('sugPr',$Suggested_Price);
    }
}
