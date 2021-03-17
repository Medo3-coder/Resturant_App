<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Auth::routes(['register'=> false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/category', 'CategoryController')->middleware('auth');
Route::resource('/food', 'FoodController')->middleware('auth');

Route::get('/','FoodController@listFood');

Route::get('/foods/{id}','FoodController@view')->name('food.view');
