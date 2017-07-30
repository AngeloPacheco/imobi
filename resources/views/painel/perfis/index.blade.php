@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Perfil de clientes</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($perfis as $perfil)
                <tr>
                    <td>{{$perfil->descricao}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('perfis.edit', $perfil->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="perfis/delete/{{$perfil->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
        <a href="{{route('perfis.create')}}" class="btn btn-primary form-btns" title="Novo Perfil ">
            <i class="fa fa-plus"></i>
        </a>
        <div class="paginacao">
            {!! $perfis->links() !!}
        </div>
    </div>
</div>        
@endsection