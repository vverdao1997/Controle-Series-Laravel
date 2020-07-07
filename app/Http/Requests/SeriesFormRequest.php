<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'qtd_temporadas' => 'required',
            'ep_por_temporada' => 'required'
        ];
    }

    public function messages()
    {
        //:attribute -> campo que lançou a excessão
        return [
            'nome.required' => "O campo :attribute é obrigatório",
            'qtd_temporadas.required' => "O campo :attribute é obrigatório",
            'ep_por_temporada.required' => "O campo :attribute é obrigatório",
            'nome.min' => "O campo :attribute precisa ter pelo menos 3 caracteres"
        ];
    }
}
