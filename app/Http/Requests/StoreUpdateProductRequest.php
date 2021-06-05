<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Determinar se o usuário tem permissão de fazer a requisição
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Aqui é onde vamos definir as regras, ou seja as nossas validações ficarão aqui dentro de rules()
     * @return array
     */
    public function rules()
    {
        //aqui vou pegar o segmento da URL para adicionar uma exceção a essa regra, pois como o nome é único, quando eu coloco a descrição com o mesmo nome do campo name,
        //dá um erro de 'name.unique', então para que isso não ocorra, vou adicionar um segmento então da URL que vai pegar justamente o ID para então eu adicionar uma exceção no return
        $id = $this->segment(2);

        //no campo 'name' estou validando que o produto terá nome único, conforme determinação na migration products
        //no campo price, estou usando um REGEX para validar se o preço está sendo digitado da forma correta! 143.33 (por exemplo)
        return [
            'name'        => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'min:3|max:10000',
            'price'       => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image'       => 'nullable|image'
        ];
    }

    /*
    * Essa função que criei deverá passas as mensagens personalizadas de validação
    */
    public function messages()
    {
        return [
            'name.required'   => 'Nome é obrigatório!',
            'name.min'        => 'Ops! Precisa informar pelo menos 3 caracteres no campo nome.',
            'name.max'        => 'Ops! Precisa informar no máximo 255 caracteres no campo nome.',
            'name.unique'     => "Ops! O campo nome já está sendo usado, escolha outro nome!",
            'description.min' => "Ops! Informe pelo menos 3 caracteres no campo descrição!",
            'price.required'  => "O preço é obrigatório!",
            'photo.required'  => 'A Imagem é obrigatória!'
        ];

    }
}
