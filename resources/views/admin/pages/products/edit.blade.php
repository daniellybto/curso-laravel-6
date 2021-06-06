@extends('admin.layouts.app')

@section('title', 'Editando Produto {$product->name}')

@section('content')
   <h1>Editando o Produto {{ $product->name }}</h1>

   <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      @method('put')
      @include('admin.pages.products._patials.form')
   </form>

@endsection