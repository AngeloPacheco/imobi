<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table ='perfis';
    protected $fillable = ['descricao']; 
}
