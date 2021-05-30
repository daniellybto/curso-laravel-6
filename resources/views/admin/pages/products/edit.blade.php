@extends('admin.layouts.app')

@section('title', 'Editando Produto')

@section('content')
   <h1>Editando o Produto {{$id}}</h1>

   <form action="{{ route('posts.update', $id) }}" method="POST">
      @csrf
      @method('put')
      <input type="text" name="name" placeholder="Nome:">
      <input type="text" name="description" placeholder="Descrição:">
      <button type="submit">Enviar</button>
   </form>

@endsection