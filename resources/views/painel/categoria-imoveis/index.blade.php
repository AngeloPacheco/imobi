@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Categoria de imóveis</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->descricao}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('categoria-imoveis.edit', $categoria->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="categoria-imoveis/delete/{{$categoria->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        <a href="{{route('categoria-imoveis.create')}}" class="btn btn-primary form-btns" title="Cadastrar nova categoria ">
            <i class="fa fa-plus"></i>
        </a>
        <div class="paginacao">
            {!! $categorias->links() !!}
        </div>
    </div>
</div>        
@endsection