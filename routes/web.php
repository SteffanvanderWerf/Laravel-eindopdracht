<?php

use Illuminate\Support\Facades\Route;

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

    Route::group(['middleware' => ['auth']], function() {
    Route::post('/home','App\Http\Controllers\HomeController@profileUpdate')->name('profileupdate');
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Route::resource('bands', 'App\Http\Controllers\BandController');
Route::post('bands/addUser/{band}/', ['App\Http\Controllers\BandController', 'addUser'])->name('addUser');
Route::post('bands/removeUser/{band}/', ['App\Http\Controllers\BandController', 'removeUser'])->name('removeUser');


 