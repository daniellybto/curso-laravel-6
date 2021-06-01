<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ['Product 01', 'Product 02', 'Product 03'];
        return $products;
    }

    public function show($id)
    {
        //usando o método firs() para obter apenas um objeto do tipo Product
        $product = Product::where('id', $id)->first();

        //outra forma de buscar pelo id é buscar pelo método find():
        //caso a busca pelo método find() não encontre nenhum resultado o retorno será 'null'
        if(!$product = Product::find($id)){
            return redirect()->back();
        }

        return view('admin.pages.products.show',[
            'product' => $product
        ]);
    }

    public function create()
    {
        return "Exibindo o formulário de cadastro de Produto";
    }

    public function edit($id)
    {
        return "Form para editar o produto: {$id}";
    }

    public function store()
    {
        return 'Cadastrando um novo produto';
    }
    
    public function update($id)
    {
        return "Editando o produto: {$id}";
    }
    
    public function destroy($id)
    {
        return "Deletando o produto: {$id}";
    }
}
