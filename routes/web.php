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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Map
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::get('/map/users/{search}', [App\Http\Controllers\MapController::class, 'users'])->name('users');

//Chantiers
Route::post('/editSite', [App\Http\Controllers\SiteController::class, 'editSite'])->name('editSite');

//Societies
Route::get('/map/societies', [App\Http\Controllers\MapController::class, 'societies'])->name('societies');