@extends('admin.layouts.app')

@section('title', 'Página de Posts')
    
@section('content')
   <h1>Exibindo os Produtos</h1>

   <a href="{{ route('posts.create') }}" class="btn btn-primary">Cadastrar</a>

   <hr>

   <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-info">Pesquisar</button>
   </form>

   <table class="table table-striped">
      <thead>
         <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th width=100>Ações</th>
         </tr>
      </thead>

      <tbody>
         @foreach ($products as $product)
             <tr>
                <td> {{ $product->name }}</td>
                <td> {{ $product->price }}</td>
                <td>
                   <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                   <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                </td>
             </tr>
         @endforeach
      </tbody>

   </table>

   {{-- agora aqui eu utilizo a função links() que irá automaticamente gerar a paginação dos resultados --}}
   {{-- como vou imprimir HTML é importante acrescentar os !! !! --}}

   {{-- para preservar a paginação eu vou usar o método appends(), verificando primeiramente se existe termo de busca através da verificação da variável requests que estou passando no ProductController --}}

   @if (isset($filters))
      {{-- caso exista termo de busca:  --}}
      {!! $products->appends($filters)->links() !!}       
   @else
      {{-- caso não existe termo de buscar --}}
      {!! $products->links() !!}       
   @endif


 @endsection  