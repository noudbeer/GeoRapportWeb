<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('register', 'App\Http\Controllers\Api\Auth\RegisterController@register');
Route::post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');
Route::post('refresh', 'App\Http\Controllers\Api\Auth\LoginController@refresh');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'App\Http\Controllers\Api\Auth\LoginController@logout');
    Route::get('sites', 'App\Http\Controllers\Api\SiteController@index');
});
