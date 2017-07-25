@extends('painel.index')
@section('content')

    <h1 class='painel-title'>Imobiliária</h1>
    <div class="row painel-row">
        <div class="col-xs-12"> 
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Sistema Informa:</h3>  
                    <p> Dados da imobiliária ainda não foram cadastrados.</p>

                    <a href="{{route('empresa.create')}}" class="btn btn-primary painel-btn" title="Cadastrar Empresa ">
                       <span class="glyphicon glyphicon-plus"></span> Cadastrar
                    </a>
                </div> 
           </div>     
        </div>
    </div>    
@endsection