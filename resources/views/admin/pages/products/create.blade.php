@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
   <h1>Cadastrar Novo Produto</h1>

   <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <input type="text" name="name" placeholder="Nome:">
      <input type="text" name="description" placeholder="Descrição:">
      <input type="file" name="photo" id="">
      <button type="submit">Enviar</button>
   </form>

@endsection