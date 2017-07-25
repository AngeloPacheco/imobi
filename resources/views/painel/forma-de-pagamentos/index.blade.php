@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Forma de pagamentos</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($formaPagtos as $formaPagto)
                <tr>
                    <td>{{$formaPagto->descricao}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('forma-de-pagamentos.edit', $formaPagto->id)}}">
                           <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="forma-de-pagamentos/delete/{{$formaPagto->id}}">
                           <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
                <a href="{{route('forma-de-pagamentos.create')}}" class="btn btn-primary form-btns" title="Cadastrar">
                    <i class="fa fa-plus"></i>
                </a>
                <div class="paginacao">
                    {!! $formaPagtos->links() !!}
                </div>
    </div>
</div>        
@endsection