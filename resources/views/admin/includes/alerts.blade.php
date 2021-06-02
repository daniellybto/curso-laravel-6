{{-- <div class="alert"> --}}
   {{-- a opção de ?? verifica se a variável está vazia --}}
   {{-- <p>Alert - {{$content ?? ''}}</p> --}}
{{-- </div> --}}


   {{-- aqui eu vou fazer a exibição os detalhes das validações, ou seja, caso tenha ocorrido algum erro será exibido aqui as mensagens de validação --}}
   {{-- aqui, o método $erros->any() verifica se existe ou não erros, se existir ele será exibido... --}}
   @if ($errors->any())
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
      
   @endif