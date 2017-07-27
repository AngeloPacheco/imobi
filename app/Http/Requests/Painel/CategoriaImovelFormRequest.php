<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaImovelFormRequest extends FormRequest
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
        $rules = [
            'descricao'  => 'required',
            
        ];
    
        return $rules;
    }
    
    public function messages() {
        
         return ['descricao.required'    => 'Insira a descrição da categoria'];
    }
}