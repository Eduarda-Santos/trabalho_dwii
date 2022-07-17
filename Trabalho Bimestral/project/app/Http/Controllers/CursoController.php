<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller {
    
    // define um atributo com array inicial e dados
    public $dados = [[
        'id' => 1,
        'nome'  => 'eduarda',
        'email' => 'eduarda@gmail.com'
    ]];

    public function __construct() {

        // obtém o conteúdo da variável de sessão "cursos"
        $aux = session('cursos');

        // verifica se a sessão já estava setada
        if(!isset($aux)) {
            // seta a sessão "cursos" com o array
            session(['cursos' => $this->dados]);
        }
    }

    public function index() {
        $dados = session('cursos');
        $cursos = "Teste";
        // Passa um array de dados com "cursos" e "clínicas"
        return view('cursos.index', compact(['dados', 'cursos']));
    }

    public function create() {

        return view('cursos.create');
    }

    public function store(Request $request) {

        // obtém os dados da sessão "cursos"
       $aux = session('cursos');
       
       // retorna um array contendo apenas os dados da coluna "id"
       $ids = array_column($aux, 'id');
       
       // verifica o total de elementos do array "id"
       if(count($ids) > 0) {
           // obtém o valor máximo do array "id" + 1
           $new_id = max($ids) + 1;
       }
       else {
           // configura novo id com 1
           $new_id = 1;
       }
       
       // Array com os dados do novo cadastro
       $novo = [  
           'id' => $new_id,
           'nome' => $request->nome,
           'email' => $request->email
       ];
       
       // Insere novo cadastro no array
       array_push($aux, $novo);
       
       // Atualiza a sessão com o novo cadastro
       session(['cursos' => $aux]);
       
       // redireciona para lista de cursos
       return redirect()->route('cursos.index');
    }

    public function show($id) {
        
        // Obtém os dados da variável de sessão "cursos"
       $aux = session('cursos');

       // Obtém o índice do array "$aux" onde está o "$id" buscado
       $indice = array_search($id, array_column($aux, 'id'));

       // Armazena os dados do cliente para o índice obtido
       $dados = $aux[$indice];
       
       // retorna a "view" e passa os dados do cliente
       return view('cursos.show', compact('dados'));
    }

    public function edit($id) {

        // Obtém os dados da variável de sessão "cursos"
       $aux = session('cursos');

       // Obtém o índice do array "$aux" onde está o "$id" buscado
       $indice = array_search($id, array_column($aux, 'id'));

       // Armazena os dados do cliente para o índice obtido
       $dados = $aux[$indice];

       // retorna a "view" e passa os dados do cliente
       return view('cursos.edit', compact('dados')); 
    }

    public function update(Request $request, $id) {
        
        // Cria o array com os novos dados do cliente
       $alterado = [
        'id' => $id,
        'nome' => $request->nome,
        'email' => $request->email
        ];

        // Obtém os dados da variável de sessão "cursos"
        $aux = session('cursos');
        
        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));
        
        // Substitui os dados do cliente com as novas informações
        $aux[$indice] = $alterado;
        
        // Atualiza a sessão com a nova alteração
        session(['cursos' => $aux]);
        
        // redireciona para lista de cursos
        return redirect()->route('cursos.index');
    }

    public function destroy($id) {
        
        // Obtém os dados da variável de sessão "cursos"
        $aux = session('cursos');

        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));
        
        // Remove o elemento em "indice" do array "$aux"
        unset($aux[$indice]);
        
        // Atualiza a sessão com a nova alteração
        session(['cursos' => $aux]);
        
        // redireciona para lista de cursos
        return redirect()->route('cursos.index');
    }
}
