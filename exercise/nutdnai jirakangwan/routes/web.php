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
// */
// Route::get('/detail-product','Product@ShowDetail');

// Route::post('/buy-product','Product@BuyProduct');

// Route::view('/view','view');

// Route::view('/home','home');

// Route::get('/product','Product@ShowProduct');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/','ProductController@index');
Route::view('/','welcome');
Route::get('product/buy','ProductController@create');
Route::post('product/buy-product','ProductController@store');
Route::resource('product','ProductController');
