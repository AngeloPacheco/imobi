<?php

namespace App\Models\painel;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = [ 'id',
                            'razao_social',
                            'nome_fantasia',
                            'responsavel',
                            'cnpj',
                            'inscricao_estadual',
                            'cep',
                            'logradouro',
                            'numero',
                            'complemento',
                            'bairro',
                            'localidade', 
                            'uf',
                            'email',
                            'site',
                            'telefone',
                            'fax',
                            'celular',
                        ];
}