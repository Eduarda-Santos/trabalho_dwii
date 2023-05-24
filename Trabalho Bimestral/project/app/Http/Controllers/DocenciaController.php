<?php

namespace App\Http\Controllers;
use App\Models\Docencia;
use App\Models\Professor;
use App\Models\Disciplina;

use Illuminate\Http\Request;

class DocenciaController extends Controller {
    
    public function index() {
        $docencia = Docencia::all();
        $professor = Professor::all();
        $disciplinas = Disciplina::all();
        return view('docencia.create', compact((['professor','disciplinas','docencia'])));
    }

    public function create() {
        $docencia = Docencia::all();        
        $professor = Professor::all();
        $disciplinas = Disciplina::all();
        return view('docencia.create', compact((['professor','disciplinas','docencia'])));
    }

    public function store(Request $request) {

        $docencia = Docencia::all();
        $professor = Professor::all();
        $disciplinas = Disciplina::all();
        $docenciav = [];

        $docenciav = explode("_", $docencia);

        $professor = $docenciav[0];
        $disciplinas = $docenciav[1];
        
        Docencia::create([
            'professor_id' => $request->professor,
            'disciplina_id' => $request->disciplinas,
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
            'professor_id' => $request->professor,
            'disciplina_id' => $request->disciplinas,
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