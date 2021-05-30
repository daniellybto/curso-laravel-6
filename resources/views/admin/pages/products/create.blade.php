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

      {{-- aqui para que eu recupere o valor de um input (caso tenha algum erro de validação), que está armazenado na seção vou utilizar o método old() --}}

      <input type = "text" name = "name"        placeholder = "Nome:" value      = "{{ old('name')}}">
      <input type = "text" name = "description" placeholder = "Descrição:" value = "{{ old('description')}}">
      <input type = "file" name = "photo" >
      <button type="submit">Enviar</button>
   </form>

@endsection