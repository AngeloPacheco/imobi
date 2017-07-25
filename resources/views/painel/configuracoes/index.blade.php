@extends('painel.index')
@section('content')

<h1 class='painel-title'>Configurações do Sistema</h1>

<div class="conf-listas">
    
    <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/usuarios')}}" title='Usuários do sistemas'>  
                <div class="conf-menu">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <div class="conf-menu-titulo">
                        <p class="conf-menu-titulo-1">Usuários</p>
                    </div>
                </div>    
            </a>    
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/empresa')}}" title='Dados da Empresa'>  
                <div class="conf-menu">
                    <i class="fa fa-university " aria-hidden="true"></i>
                    <div class="conf-menu-titulo">
                        <p class="conf-menu-titulo-1">Imobiliária<p>                   
                    </div>
                </div>    
            </a>
        </div>
    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/categoria-imoveis')}}" title='Categorias de Imóveis'>  
               <div class="conf-menu">
                   <i class="fa fa-key" aria-hidden="true" ></i>
                   <div class="conf-menu-titulo">
                       <p class="conf-menu-titulo-1">Categorias</p>
                    <p class="conf-menu-titulo-2">de Imóveis</p>
                   </div>
               </div>    
            </a>
        </div>
    </div>
     
    <div class="row"> 
    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/forma-de-pagamentos')}}" title='Forma de Pagamentos'>  
                <div class="conf-menu">
                    <i class="fa fa-dollar" aria-hidden="true"></i>
                    <div class="conf-menu-titulo">
                        <p class="conf-menu-titulo-1">Forma de</p>
                        <p class="conf-menu-titulo-2">Pagamentos</p>
                    </div>
                </div>   
            </a> 
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/categoria-de-clientes')}}" title='Categoria de Clientes'>  
                <div class="conf-menu">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <div class="conf-menu-titulo">
                        <p class="conf-menu-titulo-1">Categoria de</p>
                        <p class="conf-menu-titulo-2">Clientes</p>
                    </div>
                </div>   
            </a> 
        </div>
    </div>
    
   
</div>
   
@endsection