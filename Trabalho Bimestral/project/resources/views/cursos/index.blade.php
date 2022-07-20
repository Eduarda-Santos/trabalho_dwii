@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])

@section('titulo') Cursos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Cursos'"
                :header="['NOME', 'SIGLA', 'AÇÕES']" 
                :data="$data"
                :fields="['nome', 'sigla']"
                :hide="[true, true, false, true, false]" 
                :crud="'cursos'"
                :info="['nome', 'sigla']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection