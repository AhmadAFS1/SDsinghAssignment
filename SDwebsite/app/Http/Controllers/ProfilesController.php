<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(){
    	$user =  auth()->user(); 
    	return view('profile')->withUser($user); 
    }

    public function update(Request $request){
    	 $user =  auth()->user();
    	 $user-> update([
    	 	'name' => $request->name,
    	 	'address1' => $request->address1
    	 ]);
    	 //session()->flash('success', 'User updated successfully'); 
    	 return redirect()->route('home');; 
    }



}
