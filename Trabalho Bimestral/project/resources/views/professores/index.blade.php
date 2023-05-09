@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])

@section('titulo') Professores @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Professores'"
                :header="['STATUS','NOME', 'EMAIL', 'AÇÕES']" 
                :data="$data"
                :fields="['status','nome', 'email']"
                :hide="[true, true, true, false]" 
                :crud="'professores'"
                :info="['nome', 'email']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection