<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
    }

    public function index()
    {
        $products = ['Product 01', 'Product 02', 'Product 03'];
        return $products;
    }

    public function show($id)
    {
        //usando o método firs() para obter apenas um objeto do tipo Product
        $product = $this->repository->where('id', $id)->first();

        //outra forma de buscar pelo id é buscar pelo método find():
        //caso a busca pelo método find() não encontre nenhum resultado o retorno será 'null'
        if(!$product = $this->repository->find($id)){
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
        //outra forma de buscar pelo id é buscar pelo método find():
        //caso a busca pelo método find() não encontre nenhum resultado o retorno será 'null'
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('product'));
    }

    public function store()
    {
        return 'Cadastrando um novo produto';
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function update(StoreUpdateProductRequest $request, $id)
    {
        //outra forma de buscar pelo id é buscar pelo método find():
        //caso a busca pelo método find() não encontre nenhum resultado o retorno será 'null'
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        $product->update($request->all());
        return redirect()->route('posts.index');

    }
    
    public function destroy($id)
    {
        //outra forma de buscar pelo id é buscar pelo método find():
        //caso a busca pelo método find() não encontre nenhum resultado o retorno será 'null'
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        //aqui vai remover o produto
        $product->delete();

        //redirecionar para a lista dos produtos:
        return redirect()->route('posts.index');
    }

    /**
     * Search Products
     */
    public function search(Request $request)
    {   
        // quando eu mudo a pagina eu preciso passar meus dados da pesquisa, para isso eu vou criar um ARRAY para guardar o termo de busca:
        // $filters = $request->all(); //dessa forma aqui aparece, na URL uma variável chamada '_token=', para tirar ela eu uso a forma a seguir, com o método except()
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index',[
            'products' => $products,
            'filters'  => $filters
        ]);
    }

}
