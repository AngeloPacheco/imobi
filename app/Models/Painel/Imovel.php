<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = ['descricao',
    					   'finalidade',
    					   'cd_finalidade',
    					   'status',
    					   'cd_status',
    					   'cep',
    					   'logradouro',
    					   'numero',
    					   'complemento',
    					   'bairro',
    					   'cidade',
    					   'estado',
    					   'valor',
    					   'valor_condominio',
    					   'valor_iptu'
    					]
}
