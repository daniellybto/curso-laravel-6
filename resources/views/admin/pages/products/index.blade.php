@extends('admin.layouts.app')

@section('title', 'Página de Posts')
    
@section('content')
   <h1>Exibindo os Produtos</h1>

   <a href="{{ route('posts.create') }}" class="btn btn-primary">Cadastrar</a>
   <hr>

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
                   <a href="#">Detalhes</a>
                </td>
             </tr>
         @endforeach
      </tbody>

   </table>

   {{-- agora aqui eu utilizo a função links() que irá automaticamente gerar a paginação dos resultados --}}
   {{-- como vou imprimir HTML é importante acrescentar os !! !! --}}

   {!! $products->links() !!}

 @endsection  