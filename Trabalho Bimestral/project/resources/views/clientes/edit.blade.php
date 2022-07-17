@extends('templates.main', ['titulo' => "Clientes", 'rota' => "clientes.create"])
@section('titulo') Clientes @endsection
@section('conteudo')
<h2>Alterar Cliente</h2>
<form action="{{ route('clientes.update', $dados['id']) }}" method="POST">
   @csrf
   @method('PUT')
   <a href="{{route('clientes.index')}}"><h4>voltar</h4></a>
   <label>Nome: </label> <input type='text' name='nome' value='{{$dados['nome']}}'>
   <label>Email: </label> <input type='text' name='email' value='{{$dados['email']}}'>
   <input type="submit" value="Salvar">
</form>
@endsection