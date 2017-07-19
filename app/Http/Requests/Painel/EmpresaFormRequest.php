<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'razao_social'  => 'required',
            'nome_fantasia' => 'required',
            'email'         => 'email',
            
        ];
            $photos = count($this->input('photos'));
            foreach(range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
            }
        return $rules;
    }
    
    public function messages() {
        
         return [
                'razao_social.required'     => 'Insira a Razão Social',
                'nome_fantasia.required'    => 'Insira o Nome Fantasia.',
                'email'                     => 'Preencha o e-mail corretamente',
                'inscricao_estadual.numeric'=> 'No campo Inscrição Estadual insira somente números',
            
        ];
    }
}