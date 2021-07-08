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

Route::get('/', [App\Http\Controllers\MapController::class, 'index'])
    ->middleware('verified')
    ->name('home');

Auth::routes(['verify' => true]);

Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])
    ->middleware('verified')
    ->name('map');

Route::post('/editSite', [App\Http\Controllers\SiteController::class, 'editSite'])
    ->middleware('verified')
    ->name('editSite');
Route::get('/intervention/{intervention_id}', [App\Http\Controllers\InterventionController::class, 'index'])
    ->middleware('verified')
    ->name('intervention');


// Admin page
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])
    ->middleware('verified', 'role:admin')
    ->name('register');

Route::post('/registerUser', [App\Http\Controllers\UserController::class, 'registerUser'])
    ->middleware('verified', 'role:admin')
    ->name('registerUser');

Route::get('/confirmationRegistration', [App\Http\Controllers\Auth\RegisterController::class, 'confirmationRegistration'])
    ->middleware('verified', 'role:admin')
    ->name('confirmationRegistration');

Route::get('/customersManagement', [App\Http\Controllers\CustomersManagementController::class, 'index'])
    ->middleware('verified', 'role:admin')
    ->name('customersManagement');


// Ajax link
Route::get('sites/all', [App\Http\Controllers\SiteController::class, 'getSites'])
    ->middleware('verified')
    ->name('getSites');

Route::get('site/{site_id}/interventions', [App\Http\Controllers\InterventionController::class, 'getInterventions'])
    ->middleware('verified')
    ->name('getInterventions');

Route::get('site/{site_id}/intervention/{intervention_id}', [App\Http\Controllers\InterventionController::class, 'getIntervention'])
    ->middleware('verified')
    ->name('getIntervention');

Route::get('/users/{search}', [App\Http\Controllers\UserController::class, 'users'])
    ->middleware('verified')
    ->name('users');

Route::get('/societies/all', [App\Http\Controllers\SocietyController::class, 'societies'])
    ->middleware('verified')
    ->name('societies');
    
Route::get('/status/all', [App\Http\Controllers\StatusController::class, 'status'])
    ->middleware('verified')
    ->name('status');