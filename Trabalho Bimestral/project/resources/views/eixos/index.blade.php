@extends('templates.main', ['titulo' => "Eixos", 'rota' => "eixos.create"])

@section('titulo') Eixos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Eixos'"
                :header="['NOME', 'AÇÕES']" 
                :data="$data"
                :fields="['nome']"
                :hide="[true, true, false]" 
                :crud="'eixos'"
                :info="['nome']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection