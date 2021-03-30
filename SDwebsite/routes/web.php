<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteHistoryController;
use App\Http\Controllers\QuoteFormController;
use App\Http\Controllers\PriceController;

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

Route::get('/profile', 'ProfilesController@index')->name('profile');

Route::put('/profile', 'ProfilesController@update')->name('profile.update-profile');

//Route::get('fuelquoteform', function () {
    //return view('fuelquoteform');
//});

Route::view('/fuelquoteform', 'fuelquoteform');

Route::post('/fuelquoteform', [PriceController::class, 'viewPrice']);

Route::post('/fuelquoteform', [QuoteFormController::class,'addHistory']);


Route::get('/fuelquoteform', [PriceController::class, 'viewPrice']);
<<<<<<< HEAD

=======
>>>>>>> 34fd5361a2d1a0dd3c361025b1cb3fc6aad8d68e

Route::get('/fuelquotehistory', [QuoteHistoryController::class, 'index']);


//Route::view('fuelquotehistory', 'fuelquotehistory');


//Route::get('History', [QuoteHistoryController::class, 'show']);