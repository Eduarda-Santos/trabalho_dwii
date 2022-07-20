<?php

namespace App\Http\Controllers;
use App\Models\Docencia;
use App\Models\Professor;
use App\Models\Disciplina;

use Illuminate\Http\Request;

class DocenciaController extends Controller {
    
    public function index() {

        $data = Docencia::all();
        return view('docencia.index', compact('data'));
    }

    public function create() {

        $professor = Professor::all();
        return view('docencia.create', compact(('professor')));
        $disciplinas = Disciplina::all();
        return view('docencia.create', compact(('disciplinas')));
    }

    public function store(Request $request) {
        
        Docencia::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'professor_id' => $request->professor,
            'disciplina_id' => $request->disciplina,
        ]);
        
        return redirect()->route('docencia.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Docencia::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('docencia.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Docencia::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'professor_id' => $request->professor,
            'disciplina_id' => $request->disciplina,
        ]);

        $obj->save();

        return redirect()->route('docencia.index');
    }

    public function destroy($id) {
        
        $obj = Docencia::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('docencia.index');
    }
}