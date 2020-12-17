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


Route::post('login', '\App\Http\Controllers\ApiController@login');
Route::post('register', '\App\Http\Controllers\ApiController@register');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::get('user', 'ApiController@getAuthUser');

    Route::get('products', '\App\Http\Controllers\ProductController@index');
    Route::get('products/{id}', '\App\Http\Controllers\ProductController@show');
    Route::post('products', '\App\Http\Controllers\ProductController@store');
    Route::put('products/{id}', '\App\Http\Controllers\ProductController@update');
    Route::delete('products/{id}', '\App\Http\Controllers\ProductController@destroy');
});
