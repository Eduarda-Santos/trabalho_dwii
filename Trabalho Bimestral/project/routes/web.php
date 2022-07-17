<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Veterinario;

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
    return view('templates.main')->with('titulo', "");
})->name('index');

// Route::get('/clientes', [ClienteController::class, 'index']);
// Route::get('/clientes', 'ClienteController@index');
// Route::get('/clientes/{nome}/{idade}', 'ClienteController@index');

Route::redirect('/clientes', 301);
Route::resource('clientes', 'ClienteController');

Route::redirect('/veterinarios', 302);
Route::resource('veterinarios', 'VeterinarioController');