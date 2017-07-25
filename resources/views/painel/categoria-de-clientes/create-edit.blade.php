@extends('painel.index')
@section('content')

    @if ( isset($categoria))
        
        <h1 class='painel-title'>Categoria de clientes - Editar dados</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('categoria-de-clientes.update', $categoria->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Categoria de clientes - Nova categoria</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('categoria-de-clientes.store')}}" enctype="multipart/form-data">    
    @endif
    
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                             <p>Sistema Informa:</p>
                             @foreach($errors->all() as $error)
                                 <p>{{$error}}</p>
                             @endforeach
                        </div>
                    @endif

                    {!! csrf_field()!!}     
                    <div class="panel panel-default">
                        <div class='panel-body'>

                            <div class="form-group form-input">
                                <label class="form-label">Descrição</label>
                                <input size="40" class="form-control" type='text' name="descricao" value="{{$categoria->descricao or old('descricao')}}" autofocus="">  
                            </div><br>
                        </div>  
                    </div>
                     
                    <a href="{{url('/painel/categoria-de-clientes')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
                    </a>
                    <button class="btn btn-primary form-btns"> <span class="fa fa-save"></span></button>
                </form>  
            </div>
        </div>    
@endsection
