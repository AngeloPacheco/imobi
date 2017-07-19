<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        $title = 'Configurações do sistema';
        return view('painel.configuracoes.index', compact('title'));
    }
}
   