<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Eixo;

use Illuminate\Http\Request;

class CursoController extends Controller {
    
    public function index() {

        $data = Curso::all();
        
        return view('cursos.index', compact('data'));
    }

    public function create() {
        
        $eixos = Eixo::all();
        return view('cursos.create', compact('eixos'));
    }

    public function store(Request $request) {

        /*$request->validate([
            'nome' => 'required|max:50|min:10',
            'sigla' => 'required|max:8|min:2',
            'tempo' => 'required|max:2|min:1',
            ]);*/
        
        Curso::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixos,
        ]);
        
        return redirect()->route('cursos.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Curso::find($id);

        $eixos = Eixo::all();

        return view('cursos.create', compact('eixos'));

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('cursos.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Curso::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixos,
        ]);

        $obj->save();

        return redirect()->route('cursos.index');
    }

    public function destroy($id) {
        
        $obj = Curso::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('cursos.index');
    }
}