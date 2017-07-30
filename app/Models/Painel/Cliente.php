<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [ 'nome',
        					'tipo_pessoa',
        					'cpf_cnpj',
        					'rg_ie',
        					'cep',
        					'logradouro',
        					'numero',
        					'complemento',
        					'bairro',
        					'localidade',
        					'estado',
        					'email',
        					'fone_res',
        					'fone_com',
        					'celular',
                            'perfil',
                            'interesses',
    					  ]; 
}
