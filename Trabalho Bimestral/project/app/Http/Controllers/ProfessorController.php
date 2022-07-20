<?php

namespace App\Http\Controllers;
use App\Models\Professor;
use App\Models\Eixo;

use Illuminate\Http\Request;

class ProfessorController extends Controller {
    
    public function index() {

        $data = Professor::all();
        return view('professores.index', compact('data'));
    }

    public function create() {

        $eixos = Eixo::all();
        return view('professores.create', compact('eixos'));
    }

    public function store(Request $request) {
        
        Professor::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixos, 'UTF-8',
            'ativo' => $request->ativo,
        ]);
        
        return redirect()->route('professores.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Professor::find($id);

        $eixos = Eixo::all();

        return view('professores.create', compact('eixos'));

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('professores.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Professor::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixos, 'UTF-8',
            'ativo' => $request->ativo,
        ]);

        $obj->save();

        return redirect()->route('professores.index');
    }

    public function destroy($id) {
        
        $obj = Professor::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('professores.index');
    }
}