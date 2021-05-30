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
        return [
            'name'        => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo'       => 'required|image'
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
            'description.min' => "Ops! Informe pelo menos 3 caracteres no campo descrição!",
            'photo.required'  => 'A Imagem é obrigatória!'
        ];

    }
}
