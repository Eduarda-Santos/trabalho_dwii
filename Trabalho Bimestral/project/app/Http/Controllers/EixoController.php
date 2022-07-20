<?php

namespace App\Http\Controllers;
use App\Models\Eixo;

use Illuminate\Http\Request;

class EixoController extends Controller {
    
    public function index() {

        $data = Eixo::all();
        return view('eixos.index', compact('data'));
    }

    public function create() {
        return view('eixos.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|max:50|min:10',
            ]);
        
        Eixo::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);
        
        return redirect()->route('eixos.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Eixo::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('eixos.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Eixo::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);

        $obj->save();

        return redirect()->route('eixos.index');
    }

    public function destroy($id) {
        
        $obj = Eixo::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('eixos.index');
    }
}