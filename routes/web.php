<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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