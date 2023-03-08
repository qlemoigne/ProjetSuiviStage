<?php

use App\Http\Controllers\EventController;
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

Route::get('/', [EventController::class, 'index']);
Route::get('/activite/{id}', [EventController::class, 'activite'])->name('activite');
Route::post('/activite', [EventController::class, 'changementEtat'])->name('changementEtat');
Route::post('/cloture', [EventController::class, 'cloture'])->name('changementEtat');