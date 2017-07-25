<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class CategoriaCliente extends Model
{
    protected $table ='categoria_clientes';
    protected $fillable = ['descricao']; 
}
