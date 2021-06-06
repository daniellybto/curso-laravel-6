@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
   <h1>Cadastrar Novo Produto</h1>

   <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @include('admin.pages.products._patials.form')
   </form>

@endsection