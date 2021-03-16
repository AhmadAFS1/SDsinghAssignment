<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/profile', function () {
    //return view('profile' , 'ProfilesController@edit') -> name('profile.edit-profile'); 
    return view('profile'); 
});*/

//Route::get('profile', [ProfilesController::class, 'show']);

Route::view('/profile', 'profile')->name('edit-profile');

Route::get('/fuelquoteform', function () {
    return view('fuelquoteform');
});

Route::view('/fuelquotehistory', 'fuelquotehistory');

Route::get('History', [QuoteHistoryController::class, 'show']);