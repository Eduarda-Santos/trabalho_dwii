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
Route::get('/clientes', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::redirect('/eixos', 301);
Route::resource('eixos', 'EixoController');

Route::redirect('/cursos', 302);
Route::resource('cursos', 'CursoController');


Route::redirect('/professores', 303);
Route::resource('professores', 'ProfessorController');

Route::redirect('/disciplinas', 304);
Route::resource('disciplinas', 'DisciplinaController');

Route::redirect('/docencia', 305);
Route::resource('docencia', 'DocenciaController');