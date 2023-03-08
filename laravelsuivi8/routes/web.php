<?php

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\changementEtatController;
use App\Http\Controllers\Controllerbase;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/activite/{id}', [ActiviteController::class, 'activite'])->name('activite');
Route::post('/activite', [changementEtatController::class, 'changementEtat'])->name('changementEtat');