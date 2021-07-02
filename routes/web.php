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

Route::get('/', [App\Http\Controllers\MapController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');

Route::post('/editSite', [App\Http\Controllers\SiteController::class, 'editSite'])->name('editSite');
Route::get('/intervention/{intervention_id}', [App\Http\Controllers\InterventionController::class, 'index'])->name('intervention');


// Admin page
Route::get('/createUser', [App\Http\Controllers\UserController::class, 'createUserPage'])
    ->name('createUserPage')
    ->middleware('role:admin');
Route::get('/confirmationNewUser', [App\Http\Controllers\UserController::class, 'confirmationNewUser'])
    ->middleware('role:admin')
    ->name('confirmationNewUser');
Route::get('/customersManagement', [App\Http\Controllers\CustomersManagementController::class, 'index'])
    ->middleware('role:admin')
    ->name('customersManagement');


// Ajax link
Route::get('sites/all', [App\Http\Controllers\SiteController::class, 'getSites'])->name('getSites');
Route::get('site/{site_id}/interventions', [App\Http\Controllers\InterventionController::class, 'getInterventions'])->name('getInterventions');
Route::get('site/{site_id}/intervention/{intervention_id}', [App\Http\Controllers\InterventionController::class, 'getIntervention'])->name('getIntervention');
Route::get('/users/{search}', [App\Http\Controllers\UserController::class, 'users'])->name('users');
Route::get('/societies/all', [App\Http\Controllers\SocietyController::class, 'societies'])->name('societies');
Route::get('/status/all', [App\Http\Controllers\StatusController::class, 'status'])->name('status');