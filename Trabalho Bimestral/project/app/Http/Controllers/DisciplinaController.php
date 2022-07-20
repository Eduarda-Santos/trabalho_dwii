<?php

namespace App\Http\Controllers;
use App\Models\Disciplina;
use App\Models\Curso;

use Illuminate\Http\Request;

class DisciplinaController extends Controller {
    
    public function index() {

        $data = Disciplina::all();
        return view('disciplinas.index', compact('data'));
    }

    public function create() {

        $cursos = Curso::all();
        return view('disciplinas.create', compact(('cursos')));
    }

    public function store(Request $request) {
        
        Disciplina::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'curso_id' => $request->cursos,
            'carga' => $request->carga,
        ]);
        
        return redirect()->route('disciplinas.index');
    }

    public function show($id) { }

    public function edit($id) {

        $cursos = Curso::all();

        return view('disciplinas.create', compact(('cursos')));
        
        $data = Disciplina::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('disciplinas.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Disciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'curso_id' => $request->curso,
            'carga' => $request->carga,
        ]);

        $obj->save();

        return redirect()->route('disciplinas.index');
    }

    public function destroy($id) {
        
        $obj = Disciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('disciplinas.index');
    }
}