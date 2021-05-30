@extends('admin.layouts.app')

@section('title', 'Página de Posts')
    
@section('content')
   <h1>Exibindo os Produtos</h1>

   {{-- INCLUINDO O ARQUIVO DE ALETTS --}}
   @include('admin.alerts.alerts')
   <hr>
   
   @if (isset($products))
       @foreach ($products as $item)

{{-- a variável loop->last verifica se é o último elemento do loop --}}
         <p class="@if ($loop->last) last @endif">{{$item}}</p>
       @endforeach
   @endif   

   <hr>

   @forelse ($products as $product)

{{-- a variável loop->first verifica se é o Primeiro elemento do loop --}}
      <p class="@if ($loop->first) last @endif">{{$product}}</p>       
   @empty
       <p>Não existem produtos cadastrados </p>
   @endforelse

   <hr>

   @if ($test === 123)
      é igual
   @else
      É diferente
   @endif

{{-- Esse operador @unless é o contrário do if, ou seja, só entra aqui se for diferente! --}}
   @unless ($test === '123')
      dasdfasdfasdf
   @else
      mfjfjfjfjf
   @endunless


{{-- o @isset verifica se a variável existe --}}
   @isset($test2)
      {{$test2}}
   @endisset
   
{{-- o @empty verifica se a variável está vazia --}}
   @empty($test3)
      <p>Vazio...</p>       
   @endempty   


{{-- a diretiva @auth verifica se o usuário está autenticado --}}
   @auth
       <p>Autenticado</p>
      @else
         <p>Não Autenticado</p>
   @endauth

{{-- a diretiva @guest só vai entrar se o usuário não estiver autenticado! --}}
   @guest
      <p>Não Autenticado guest</p>    
   @endguest


   @switch($test)
         @case(1)
            Igual a 1
            @break
         @case(123)
            Igual a 123
            @break
         @default
            Default           
   @endswitch

@endsection


<style>
   .last {background: #ccc;}
</style>