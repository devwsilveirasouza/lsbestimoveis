<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'        => 'bail|required|min:3|max:100',
            'cidade_id'     => 'bail|required|integer',
            'tipo_id'       => 'bail|required|integer',
            'finalidade_id' => 'bail|required|integer',
            'preco'         => 'bail|required|numeric|min:0',
            'dormitorios'   => 'bail|required|integer|min:0',
            'salas'         => 'bail|required|integer|min:0',
            'terreno'       => 'bail|required|integer|min:0',
            'banheiros'     => 'bail|required|integer|min:0',
            'garagens'      => 'bail|required|integer|min:0',
            'descrição'     => 'bail|nullable|string',
            'rua'           => 'bail|required|min:1|max:100',
            'numero'        => 'bail|required|integer',
            'complemento'   => 'bail|nullable|string',
            'bairro'        => 'bail|required|min:3|max:50',
            'proximidades'  => 'bail|nullable|array'
        ];
    }
    /**
     * Customizar o nome dos campos para as mensagens de erro
     */
    public function attributes()
    {
        return [
            'titulo'        => 'título',
            'cidade_id'     => 'cidade',
            'tipo_id'       => 'tipo de imóvel',
            'finalidade_id' => 'finalidade',
            'preco'         => 'preço',
            'dormitorios'   => 'quantidade de dormitórios',
            'salas'         => 'quantidade de salas',
            'banheiros'     => 'quantidade de banheiros',
            'garagens'      => 'vagas na garagem',
            'descrição'     => 'descrição',
            'numero'        => 'número',
            'proximidades'  => 'pontos de interesse nas proximidades'
        ];
    }
    /**
     * Customizar as mensagens de erro para uma regra ou para um campo/regra
     */
    public function messages()
    {
        return [
                'required'                  => 'Favor inserir um valor para o campo :attribute',
                /** Ou diretamente no campo */
                'finalidade_id.required'    => 'Favor selecionar uma opção',
                'titulo.min'                => 'Favor inserir pelo menos :min caracteres para o :attribute'
        ];
    }
}
