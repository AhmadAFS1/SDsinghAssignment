<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteHistory;
use DB;

class PriceController extends Controller
{
    function viewPrice(Request $req)
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

        if(empty($address) || empty($city) || empty($state) || empty($zip))
        {
            $fulladdress = "Full address not given!"; 
            $Suggested_Price = 3.0;
        }
        else
        {
            $t_state = $state;

            if($t_state != 'TX' or $t_state == NULL){
                $t_state = 'Others';
            }
            $fetch_price_obj = DB::select(sprintf('select price from prices where state = \'%s\'', $t_state));
            
            if($fetch_price_obj != NULL){
                $Suggested_Price = DB::select(sprintf('select price from prices where state = \'%s\'', $t_state))[0]->price;
            }
            else{
                Controller::console_log('No data in prices table!');
                $Suggested_Price = 3.0;
            }
        }

        $Address = $fulladdress;        
        $QuoteFormData = array($Suggested_Price, $Address);
        Controller::console_log('Success!');

        return view('fuelquoteform', ['QuoteFormData' => $QuoteFormData]);
        
    }
}
