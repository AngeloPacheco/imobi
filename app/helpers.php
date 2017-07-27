<?php

/* Validar se  corretor ou CRECI já está cadastrado*/
function existeCorretor($nome, $creci){
  
  $query = DB::table('corretores')
           ->select('corretores.id')
           ->where('corretores.nome', '=', $nome)
           ->orwhere('corretores.creci', '=', $creci)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se  categoria de imoveis já está cadastrada*/
function existeCategoriaImovel($descricao){
  
  $query = DB::table('categoria_imoveis')
           ->select('categoria_imoveis.id')
           ->where('categoria_imoveis.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se  forma de pagamento já está cadastrada*/
function existeFormaPagto($descricao){
  
  $query = DB::table('forma_pagtos')
           ->select('forma_pagtos.id')
           ->where('forma_pagtos.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se  categoria de clientes já está cadastrada*/
function existePerfil($descricao){
  
  $query = DB::table('perfis')
           ->select('perfis.id')
           ->where('perfis.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se cliente já está cadastrada*/
function existeCliente($cpf_cnpj){
  
  $query = DB::table('clientes')
           ->select('clientes.id')
           ->where('clientes.cpf_cnpj', '=', $cpf_cnpj)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}