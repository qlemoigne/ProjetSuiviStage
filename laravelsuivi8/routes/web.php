<?php
use App\Http\Controllers\Controllerbase;
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

Route::get('/', [Controllerbase::class, 'index']);
Route::get('/activite/{id}', [Controllerbase::class, 'activite'])->name('activite');
Route::post('/activite', [Controllerbase::class, 'changementEtat'])->name('changementEtat');
Route::post('/cloture', [Controllerbase::class, 'cloture'])->name('changementEtat');