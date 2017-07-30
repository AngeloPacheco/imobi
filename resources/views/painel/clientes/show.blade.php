@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">
        <h1>Dados do cliente</h1>
        <div class="panel panel-default painel-panel">
            <div class="panel-body">

                <div class="renderiza-foto-show">
                    @foreach($imagens as $imagem)
                         @if ($imagem)
                           <img class="img-thumbnail" src="{{url('storage'). '/' . $imagem->nm_imagem}}">
                         @endif  
                    @endforeach 
                </div>           
                <p><b>Perfil : </b> {{$cliente->perfil}}</p>
                <p><b>Nome : </b> {{$cliente->nome}}</p>
                <p><b>CPF/CNPJ : </b> {{$cliente->cpf_cnpj}}</p>
                
                @if (isset($cliente->rg_ie))
                    <p><b>RG/IE : </b> {{$cliente->rg_ie}}</p>
                @endif    
                
                <p><b>CEP : </b> {{$cliente->cep}}</p>
                <p><b>Logradouro : </b> {{$cliente->logradouro}}</p>
                <p><b>Número : </b> {{$cliente->numero}}</p>
                 
                @if (isset($cliente->complemento))
                    <p><b>Complemento :</b> {{$cliente->complemento}}</p>
                @endif
                    
                <p><b>Bairro :</b> {{$cliente->bairro}}</p>
                <p><b>Cidade : </b> {{$cliente->localidade}}</p>
                <p><b>Estado : </b> {{$cliente->estado}}</p>
                
                @if (isset($cliente->fone_res))
                    <p><b>Telefone Residencial : </b> {{$cliente->fone_res}}</p>
                @endif
                    
                @if (isset($cliente->fone_com))
                    <p><b>Telefone Comercial :</b> {{$cliente->fone_com}}</p>
                @endif
                    
                @if (isset($cliente->celular))
                    <p><b>Celular :</b> {{$cliente->celular}}</p>
                @endif
                    
                @if (isset($cliente->email))
                    <p><b>E-mail :</b> {{$cliente->email}}</p>
                @endif
                
                @if (!empty($docs))  
                    <h4>Documentações</h4>
                    @foreach($docs as $doc)
                       <p>{{$doc->descricao}}
                       <a title="Download do arquivo" target="_blank" href="{{url('storage/') . '/' . $doc->nm_arquivo}}" <span class="fa fa-download"></span></a></p>
                    @endforeach
                @endif    
                <hr>
                <p><b>Data de cadastro : </b> {{date_format($cliente->created_at,'d/m/Y')}}</p>
                <p><b>Últma atualização :</b>  {{date_format($cliente->updated_at,'d/m/Y')}}</p>
                  
                
            </div>
        </div>
            
            <a href="{{url('/painel/clientes')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
             </a>
            
            <a href="{{route('clientes.edit', $cliente->id)}}" class="btn btn-primary form-btns" title="Editar">
               <span class="fa fa-edit"></span>
            </a>
    </div>
</div>                
@endsection