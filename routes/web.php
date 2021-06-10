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

Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::post('/editSite', [App\Http\Controllers\SiteController::class, 'editSite'])->name('editSite');

// Ajax link
//Route::get('/sites/{search}', [App\Http\Controllers\UserController::class, 'site'])->name('site');
Route::get('site/{number}/interventions', [App\Http\Controllers\InterventionController::class, 'getInterventions'])->name('getInterventions');
Route::get('/users/{search}', [App\Http\Controllers\UserController::class, 'users'])->name('users');
Route::get('/societies/all', [App\Http\Controllers\SocietyController::class, 'societies'])->name('societies');
Route::get('/status/all', [App\Http\Controllers\StatusController::class, 'status'])->name('status');