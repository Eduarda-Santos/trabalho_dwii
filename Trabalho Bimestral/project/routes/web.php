<?php

use Illuminate\Support\Facades\Route;
use App\Models\Docencia;
use App\Models\Disciplina;
use App\Models\Professor;
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

Route::post('docencia/add', function(Request $request) {
    $obj_docencia = new Docencia();
    $obj_docencia->save();

    $obj_professores = new Professor();
    $obj_professores->status = $request->status;
    $obj_professores->nome = mb_strtoupper($request->nome_professores, 'UTF-8');
    $obj_professores->email = $request->email;
    $obj_professores->siape = $request->siape;
    $obj_professores->eixo_id = $request->eixo_id;
    $obj_professores->save();

    $obj_disciplinas = new Disciplina();
    $obj_disciplinas->nome = mb_strtoupper($request->nome_disciplinas, 'UTF-8');
    $obj_disciplinas->curso_id = $request->curso_id;
    $obj_disciplinas->carga = $request->carga;

    $obj_docencia->docencia()->associate($obj_professores);
    $obj_docencia->docencia()->associate($obj_disciplinas);
    $obj_docencia->save();
});

//cursos docencia
Route::get('/docencias', function () {
    $docencia = Docencia::with(['professor'->orderBy('id', 'nome')])->get();
    $docencia = Docencia::with(['disciplinas'->orderBy('id', 'nome')])->get();
    return $docencia->toJson();
});