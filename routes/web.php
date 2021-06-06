<?php

//importante colocar o método any(), pois daí faremos o search/filtro na paginação!
//outro ponto importante é o nome da rota ser o mesmo da action do controller e depois do /
Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth'); //com esse middleware eu garanto que essa rota só poderá se acessada se o usuário estiver autenticado!

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoria/{flag}', function($flag) {
    return "Produto da Categoria: {$flag}";
});

Route::get('/categoria/{url}/posts', function($url) {
    return "Posts da categoria: {$url}";
});

//parâmetros opcionais/dinâmicos, coloco uma '?' depois do parâmetro e defino um valor default na função de callback:
Route::get('/produtos/{idProduto?}', function ($idProduto = '') {
    return "Produto(s) {$idProduto}";
});

//Rotas com redirecionamento -> dessa rota para a rota 'redirect2':
Route::get('redirect1', function() {
    return redirect('/redirect2');
});

//outra forma de fazer o redirecionamento:
Route::redirect('/redirect3', '/redirect2');

Route::get('redirect2', function() {
    return 'Redirect 02';
});

//Retornando a view diretamente:
Route::get('/view', function() {
    return view('welcome');
});

//outra forma de retornar o view:
Route::view('/contact', 'contact');

//Rotas nomeadas:
Route::get('hehe', function () {
    return redirect()->route('url.name');
});

Route::get('/name-url', function() {
    return "hehehehehehe";
})->name('url.name');


//grupo de rotas:
//forma não recomendada em sem agrupamento:

// Route::get('/admin/dashboard', function(){
//     return "Home Admin";
// })->middleware('auth');

// Route::get('/admin/financeiro', function(){
//     return "Financeiro Admin";
// })->middleware('auth');

// Route::get('/admin/produtos', function(){
//     return "Produtos Admin";
// })->middleware('auth');


//forma com agrupamento de rotas:
Route::middleware([])->group(function() {

    //esse prefix() é o que define o nome do prefixo das rotas
    Route::prefix('admin')->group(function () {

        //grupo de rotas para Namespaces:
        Route::namespace('Admin')->group(function() {

            Route::get('/dashboard', 'TesteController@teste');
            
            Route::get('/financeiro', 'TesteController@teste');
            
            Route::get('/produtos', 'TesteController@teste');
    
            Route::get('/', 'TesteController@teste');
        });
    });  
});

//métodos sem resources
// Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
// Route::put('products/{id}', 'ProductController@update')->name('products.update');
// Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
// Route::get('products/create', 'ProductController@create')->name('products.create');
// Route::get('products/{id}', 'ProductController@show')->name('products.show');
// Route::get('products', 'ProductController@index')->name('products.index');
// Route::post('products', 'ProductController@index')->name('products.index');

//método com Resources:
Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('posts', 'PostController')->middleware('auth');
//para desativar o register, isso serve para não deixar que outros usuários se cadastrem no sistema:
Auth::routes(['register' => false]);
// Auth::routes();
