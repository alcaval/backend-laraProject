<?php

use App\Http\Controllers\HistController;
use App\Http\Controllers\hospitalCont;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/allUsers',[UserController::class, 'getUsers']);
Route::post('/edit/{id}',[UserController::class, 'edit']);
Route::get('getH/{id}', [HistController::class, 'getHistorial']);
Route::get('getHs', [HistController::class, 'getHistoriales']);
Route::post('addH', [HistController::class, 'addHistorial']);
Route::post('saveH/{id}', [HistController::class, 'saveHistorial']);
Route::post('eraseH/{id}', [HistController::class, 'eraseHistorial']);

//HOSPITALES
Route::get('getHo/{id}', [hospitalCont::class, 'getHo']);
Route::get('getHos', [hospitalCont::class, 'getHos']);
Route::post('addHos', [hospitalCont::class, 'addHos']);
Route::post('saveHos/{id}', [hospitalCont::class, 'saveHos']);
Route::post('eraseHos/{id}', [hospitalCont::class, 'eraseHos']);

Route::get('/admin', [PageCont::class, 'admin']);