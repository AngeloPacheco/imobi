@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Infraestruturas</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($infras as $infra)
                <tr>
                    <td>{{$infra->descricao}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('infraestruturas.edit', $infra->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="infraestruturas/delete/{{$infra->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        <a href="{{route('infraestruturas.create')}}" class="btn btn-primary form-btns" title="Cadastrar">
            <i class="fa fa-plus"></i>
        </a>
        <div class="paginacao">
            {!! $infras->links() !!}
        </div>
    </div>
</div>        
@endsection