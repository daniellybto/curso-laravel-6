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

