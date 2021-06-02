@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
   <h1>Cadastrar Novo Produto</h1>

   @include('admin.includes.alerts')

   <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
         {{-- aqui para que eu recupere o valor de um input (caso tenha algum erro de validação), que está armazenado na seção vou utilizar o método old() --}}
         <input type = "text" name = "name" class="form-control" placeholder = "Nome:" value = "{{ old('name')}}">
      </div>

      <div class="form-group">
         <input type = "text" name = "price" class="form-control" placeholder = "Preço:" value = "{{ old('price')}}">
      </div>   

      <div class="form-group">
         <input type = "text" name = "description" class="form-control" placeholder = "Descrição:" value = "{{ old('description')}}">
      </div>      

      <div class="form-group">
         <input type = "file" name = "image" >
      </div>
      
      <div class="form-group">
         <button type="submit" class="btn btn-success">Enviar</button>
      </div>
   </form>

@endsection