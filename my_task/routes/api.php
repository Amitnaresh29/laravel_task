<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthControllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products',  'App\Http\Controllers\ProductsController@index');
Route::post('/login',  'App\Http\Controllers\AuthControllers@login');
Route::post('/googleLogin',  'App\Http\Controllers\AuthControllers@googleLogin');
Route::post('/facebookLogin', 'App\Http\Controllers\AuthControllers@facebookLogin');
