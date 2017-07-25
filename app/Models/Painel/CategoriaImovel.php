<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class CategoriaImovel extends Model
{
    protected $table ='categoria_imoveis';
    protected $fillable = ['descricao']; 
}
