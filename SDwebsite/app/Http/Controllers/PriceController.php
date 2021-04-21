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

        //Final Assignment thing 
        /*
        function getTheActualPrice(){
        
        int basePay = $1.50; //given
        
        if(location not in Texas){
            int locationFactor = 0.04;
        }else{int locationFactor = 0.02;} //self-explanatory 
        
        //find whether the user's id is even in the  FuelQuoteHistory table at all

        if (DB::table('QuoteHistory')->where('user_id', $user)->exists()) {
            int HistoryFactor = 0.01;
        }
        if (DB::table('QuoteHistory')->where('user_id', $user)->doesntExist()) {
            int HistoryFactor = 0;
        }

        if(Gallons > 1000)  <- idk how to do this one in this controller
        int GallonsRequestedFactor = idk; 


        int CompanyProfit = 0.10;
        
        int ResultingPrice = (locationFactor - HistoryFactor + GallonsRequestedFactor)*basePay

        return ResultingPrice;
        }
        */


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
