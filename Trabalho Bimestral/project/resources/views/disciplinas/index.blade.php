@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])

@section('titulo') Disciplinas @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Disciplinas'"
                :header="['NOME', 'CARGA', 'AÇÕES']" 
                :data="$data"
                :fields="['nome', 'carga']"
                :hide="[true, false, true, false]" 
                :crud="'disciplinas'"
                :info="['id', 'nome', 'carga']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection