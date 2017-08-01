@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Clientes</h1>
        <div class="form-search">
             <form class="form-inline" name="formPesquisa" method="post" role="form" action="{{url('painel/clientes/busca')}}">

                 <input class="form-control" type="text" name="descricao" value="" placeholder="Pesquisar"  title='Pesquisa por nome, CPF, CNPJ, cidade, celular e interesses.' autofocus="" size="30">
                 {!! csrf_field()!!}
                <button class="btn btn-primary painel-btn-pesquisar" type="submit" title="Pesquisar">
                        <span class="fa fa-search"></span>
                </button>
            </form>
        </div>
        
        <h5>{{$msg}}<h5>
        
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Nome</th>
                <th>Perfil</th>
                <th>Cidade</th>
                <th>Celular</th>
                <th width="150px">Ações</th>
            </tr>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nome}}</td> 
                    <td>{{$cliente->perfil}}</td> 
                    <td>{{$cliente->localidade}}</td> 
                    <td>{{$cliente->celular}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('clientes.edit', $cliente->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-eye" title="Detalhes" href="{{route('clientes.show', $cliente->id)}}">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="clientes/delete/{{$cliente->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
        <a href="{{route('clientes.create')}}" class="btn btn-primary form-btns" title="Novo cliente">
            <i class="fa fa-plus"></i>
        </a>
        <div class="paginacao">
            {!! $clientes->links() !!}
        </div>
    </div>
</div>        
@endsection