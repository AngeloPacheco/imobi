@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Corretores</h1>
        <table class="table table-striped">
            <tr class="tabela-cabecalho">
                <th>Nome</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>CRECI</th>
                <th width="150px">Ações</th>
            </tr>
            @foreach($corretores as $corretor)
                <tr>
                    <td>{{$corretor->nome}}</td> 
                    <td>{{$corretor->celular}}</td> 
                    <td>{{$corretor->email}}</td> 
                    <td>{{$corretor->creci}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit"  title="Editar" href="{{route('corretores.edit', $corretor->id)}}">
                            <i class="fa fa-pencil" ></i>
                        </a>
                        <a class="btn-actions btn-eye" title="Detalhes" href="{{route('corretores.show', $corretor->id)}}">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn-actions btn-delete"  title="Excluir" href="corretores/delete/{{$corretor->id}}">
                          <i class="fa fa-trash"></i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
                <a href="{{route('corretores.create')}}" class="btn btn-primary form-btns" title="Cadastrar novo corretor ">
                    <i class="fa fa-plus"></i>
                </a>
                <div class="paginacao">
                    {!! $corretores->links() !!}
                </div>
            
        
    </div>
</div>        
@endsection