<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class DocsCliente extends Model
{
    protected $fillable = ['nm_arquivo','descricao','path','cliente_id'];

}
