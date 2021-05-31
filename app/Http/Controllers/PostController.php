<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = 123;
        // $test3 = [1,2,3,4,5,6];
        // $products = ['Tv', 'Geladeira', 'Forno', "Sofa"];
        // $products = [];

        //a função all() exibi todos os registros ...
        // $products = Product::all();
                
        //aqui eu chamo os registros e utilizo a paginação...
        $products = Product::paginate();        

        return view('admin.pages.products.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd("Ok");

        // o método $request->all() mostra todos os dados da requisição!
        // dd($request->all());

        // o método $request->only() mostra pega dados específicos da requisição, por exemplo o 'name' e description:
        // dd($request->only(['name', 'description']));

        //o método $request->***** pega um dados específico da requisição, por exemplo o name:
        // dd($request->name);

        //outra opção é o $request->has(), para saber se o campo existe ou não: - caso não exista ele irá retornar false!
        // dd($request->has('teste'));

        //o método $request->input(''), vai retornar somente o valor daquele campo input!, caso esse campo não exista eu insiro um valor default
        // dd($request->input('nome', 'valor default'));

        //o método $request->except('') retorna todos os valores, EXCETO o que eu inserir dentro das aspas:
        // dd($request->except('name'));

        //método para receber upload de arquivos:
        //daí eu já posso usar outro método para saber se esse arquivo é válido ou não (->isValid())
        // dd($request->file('photo')->isValid());

        //aqui podemos validar os dados do formulário:
        // $request->validate([
        //     'name'        => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo'       => 'required|image'
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
