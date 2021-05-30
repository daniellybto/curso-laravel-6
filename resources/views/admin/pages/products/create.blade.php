@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
   <h1>Cadastrar Novo Produto</h1>

   {{-- aqui eu vou fazer a exibição os detalhes das validações, ou seja, caso tenha ocorrido algum erro será exibido aqui as mensagens de validação --}}
   {{-- aqui, o método $erros->any() verifica se existe ou não erros, se existir ele será exibido... --}}
   @if ($errors->any())
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
      
   @endif

   <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <input type="text" name="name" placeholder="Nome:">
      <input type="text" name="description" placeholder="Descrição:">
      <input type="file" name="photo" id="">
      <button type="submit">Enviar</button>
   </form>

@endsection