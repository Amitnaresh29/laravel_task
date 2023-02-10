<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthControllers;


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

Route::get('/products',  'App\Http\Controllers\ProductsController@index');
Route::post('/login',  'App\Http\Controllers\AuthControllers@login');
Route::post('/googleLogin',  'App\Http\Controllers\AuthControllers@googleLogin');
Route::post('/facebookLogin', 'App\Http\Controllers\AuthControllers@facebookLogin');

