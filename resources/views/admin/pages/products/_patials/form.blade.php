@include('admin.includes.alerts')

@csrf

<div class="form-group">
   <label for="name">Nome:</label>

   {{-- aqui para que eu recupere o valor de um input (caso tenha algum erro de validação), que está armazenado na seção vou utilizar o método old() --}}
   <input type="text" id="name" name="name" placeholder="Nome:" value="{{ $product->name ?? old('name') }}" class="form-control">
</div>

<div class="form-group">
   <label for="price">Preço:</label>
   <input type="text" id="price" name="price" placeholder="Preço" value="{{ $product->price ?? old('price') }}" class="form-control">
</div>

<div class="form-group">
   <label for="description">Descrição:</label>
   <input type="text" id="description" name="description" placeholder="Descrição:" value="{{ $product->description ?? old('description') }}" class="form-control">
</div>

<div class="form-group">
   <input type = "file" name = "image" >
</div>

<div class="form-group">
   <button type="submit" class="btn btn-success">Enviar</button>
</div>