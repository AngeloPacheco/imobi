@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        <h1>Dados do corretor</h1>
        <div class="panel panel-default painel-panel">
            <div class="panel-body">

                <div class="renderiza-foto-show">
                    @foreach($imagens as $imagem)
                         @if ($imagem)
                           <img class="img-thumbnail" src="{{url('storage'). '/' . $imagem->nm_imagem}}">
                         @endif  
                    @endforeach 
                </div>           
                <p><b>Nome : </b> {{$corretor->nome}}</p>
                <p><b>CRECI : </b> {{$corretor->creci}}</p>
                <p><b>Telefone Residencial : </b> {{$corretor->fone_res}}</p>
                <p><b>Telefone Comercial :</b> {{$corretor->fone_com}}</p>
                <p><b>Ramal :</b> {{$corretor->ramal}}</p>
                <p><b>Celular :</b> {{$corretor->celular}}</p>
                <p><b>E-mail :</b> {{$corretor->email}}</p>
                <p><b>Comissão :</b> {{$corretor->comissao}}% </p>
                <p><b>Data de cadastro : </b> {{date_format($corretor->created_at,'d/m/Y')}}</p>
                <p><b>Últma atualização :</b>  {{date_format($corretor->updated_at,'d/m/Y')}}</p>
            </div>
        </div>
            
            <a href="{{url('/painel/corretores')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
             </a>
            
            <a href="{{route('corretores.edit', $corretor->id)}}" class="btn btn-primary form-btns" title="Editar">
               <span class="fa fa-edit"></span>
            </a>
    </div>
</div>                
@endsection