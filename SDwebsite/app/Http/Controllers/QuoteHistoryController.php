<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;
use DB;
use App\Models\QuoteHistory;

class QuoteHistoryController extends Controller
{
    function index()
    {
      //echo "Hello";
      $user =  auth()->user();
      $collection = DB::select(sprintf('select * from quote_histories where user_id = %d', $user -> id));
      return view('fuelquotehistory', ['collection' => $collection]);
   //   $data = QuoteHistory::all();
   //   return view('fuelquotehistory', 'orders' => $data);   uncomment once DB is implemented
      //return view('fuelquotehistory');
    }
}
