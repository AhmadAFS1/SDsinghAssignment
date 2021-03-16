<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Models\profile;

class ProfilesController extends Controller
{
    function show()
    {
   //   $data = QuoteHistory::all();
   //   return view('fuelquotehistory', 'orders' => $data);   uncomment once DB is implemented
      
      return view('profile');
      
    }
}
