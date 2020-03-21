<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/product', 'ProductController@Store');

Route::get('/product', 'ProductController@Index');

Route::get('/product/{id}', 'ProductController@Show');

Route::delete('/product/{id}', 'ProductController@Destroy');

Route::put('/product/{id}', 'ProductController@Update');
