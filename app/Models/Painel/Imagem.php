<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = "imagens";
    protected $fillable = ['nm_imagem','titulo','conteudo_id','conteudo_tipo', 'path', 'ordem'];
    
}
