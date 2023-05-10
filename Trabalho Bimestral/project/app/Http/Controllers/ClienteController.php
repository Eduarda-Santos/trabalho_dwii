<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller {
    
    // define um atributo com array inicial e data
    public $data = [[
        'id' => 1,
        'nome'  => 'eduarda',
        'email' => 'eduarda@gmail.com'
    ]];

    public function __construct() {

        // obtém o conteúdo da variável de sessão "clientes"
        $aux = session('clientes');

        // verifica se a sessão já estava setada
        if(!isset($aux)) {
            // seta a sessão "clientes" com o array
            session(['clientes' => $this->data]);
        }
    }

    public function index() {
        $data = session('clientes');
        $clinica = "VetClin DWII";
        // Passa um array de data com "clientes" e "clínicas"
        return view('clientes.index', compact(['data', 'clinica']));
    }

    public function create() {

        return view('clientes.create');
    }

    public function store(Request $request) {

        // obtém os data da sessão "clientes"
       $aux = session('clientes');
       
       // retorna um array contendo apenas os data da coluna "id"
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
       
       // Array com os data do novo cadastro
       $novo = [  
           'id' => $new_id,
           'nome' => $request->nome,
           'email' => $request->email
       ];
       
       // Insere novo cadastro no array
       array_push($aux, $novo);
       
       // Atualiza a sessão com o novo cadastro
       session(['clientes' => $aux]);
       
       // redireciona para lista de clientes
       return redirect()->route('clientes.index');
    }

    public function show($id) {
        
        // Obtém os data da variável de sessão "clientes"
       $aux = session('clientes');

       // Obtém o índice do array "$aux" onde está o "$id" buscado
       $indice = array_search($id, array_column($aux, 'id'));

       // Armazena os data do cliente para o índice obtido
       $data = $aux[$indice];
       
       // retorna a "view" e passa os data do cliente
       return view('clientes.show', compact('data'));
    }

    public function edit($id) {

        // Obtém os data da variável de sessão "clientes"
       $aux = session('clientes');

       // Obtém o índice do array "$aux" onde está o "$id" buscado
       $indice = array_search($id, array_column($aux, 'id'));

       // Armazena os data do cliente para o índice obtido
       $data = $aux[$indice];

       // retorna a "view" e passa os data do cliente
       return view('clientes.edit', compact('data')); 
    }

    public function update(Request $request, $id) {
        
        // Cria o array com os novos data do cliente
       $alterado = [
        'id' => $id,
        'nome' => $request->nome,
        'email' => $request->email
        ];

        // Obtém os data da variável de sessão "clientes"
        $aux = session('clientes');
        
        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));
        
        // Substitui os data do cliente com as novas informações
        $aux[$indice] = $alterado;
        
        // Atualiza a sessão com a nova alteração
        session(['clientes' => $aux]);
        
        // redireciona para lista de clientes
        return redirect()->route('clientes.index');
    }

    public function destroy($id) {
        
        // Obtém os data da variável de sessão "clientes"
        $aux = session('clientes');

        // Obtém o índice do array "$aux" onde está o "$id" buscado
        $indice = array_search($id, array_column($aux, 'id'));
        
        // Remove o elemento em "indice" do array "$aux"
        unset($aux[$indice]);
        
        // Atualiza a sessão com a nova alteração
        session(['clientes' => $aux]);
        
        // redireciona para lista de clientes
        return redirect()->route('clientes.index');
    }
}
