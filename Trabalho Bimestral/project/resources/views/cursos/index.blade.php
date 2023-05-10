@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])

@section('titulo') Cursos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Cursos'"
                :header="['NOME', 'TEMPO', 'SIGLA', 'AÇÕES']" 
                :data="$data"
                :fields="['nome', 'tempo', 'sigla']"
                :hide="[true, true, true, false]" 
                :crud="'cursos'"
                :info="['nome', 'tempo', 'sigla']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection