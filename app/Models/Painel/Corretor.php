<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    protected $table = 'corretores';
    protected $fillable = ['nome', 'fone_res', 'fone_com', 'ramal', 'celular','email','creci','comissao'];
}
