@extends('painel.index')
@section('content')

    @if ( isset($empresa))
        
        <h1 class='painel-title'>Editar</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('empresa.update', $empresa->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Nova imobiliária</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('empresa.store')}}" enctype="multipart/form-data">    
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
                    <div class="panel panel-default panel-foto">
                        <div class='panel-heading'>Logomarca</div>        
                            <div class='panel-body'>

                                @if ( isset ($nm_imagem))
            
                                    <div  id="logomarca">
                                       <img class="img-thumbnail renderiza-foto-cadastro" src="{{url('storage/img-empresa') . '/' . $nm_imagem}}">      
                                    </div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary'>Selecionar</label>                        
            
                                @else              
            
                                    <div id="logomarca"></div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary painel-btn'>Selecionar</label>

                                @endif     
                            </div>    
                    </div>     
                           
                    <div class="panel panel-default">
                        <div class='panel-body'>

                            <div class="form-group form-input">
                                <label class="form-label">Razão Social</label>
                                <input size="43" class="form-control" type='text' name="razao_social" value="{{$empresa->razao_social or old('razao_social')}}" autofocus="">  
                            </div>

                            <div class="form-group form-input">
                                <label class="form-label">Nome Fantasia</label>
                                 <input size="43" class="form-control" type='text' name="nome_fantasia" value="{{$empresa->nome_fantasia or old('nome_fantasia')}}">  
                            </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">CNPJ</label>
                                <input size="19" class="form-control" type='text' id='cnpj' name="cnpj" value="{{$empresa->cnpj or old('cnpj')}}">  
                            </div>

                            <div class="form-group form-input">
                                    <label class="form-label">Inscrição Estadual</label>
                                    <input size="16" class="form-control" type='text' name="inscricao_estadual" value="{{$empresa->inscricao_estadual or old('inscricao_estadual')}}">  
                           </div>

                            <div class="form-group form-input">
                                <label class="form-label">Responsável</label>
                                <input size="20" class="form-control" type='text' name="responsavel" value="{{$empresa->responsavel or old('responsavel')}}">  
                            </div>
                            
                        </div>        
                    </div>
                        
                    <div class="panel panel-default">
                        <div class='panel-body'>
                        
                            <div class="form-group form-input">
                                <label class="form-label">CEP</label>
                                <input size="15" class="form-control" type='text' id='cep' name="cep" value="{{$empresa->cep or old('cep')}}">  
                            </div>                           
 
                            <div class="form-group form-input">
                                <label class="form-label">Logradouro</label>
                                <input size="50" class="form-control" type='text' id="logradouro"  name="logradouro" value="{{$empresa->logradouro or old('logradouro')}}">  
                             </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">Número</label>
                                <input size="5" class="form-control" type='text' name="numero" value="{{$empresa->numero or old('numero')}}">  
                             </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">Complemento</label>
                                <input size="15" class="form-control" type='text' name="complemento" value="{{$empresa->complemento or old('complemento')}}">  
                             </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">Bairro</label>
                                <input size="25" class="form-control" type='text' id='bairro' name="bairro" value="{{$empresa->bairro or old('bairro')}}">  
                            </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">Cidade</label>
                                <input size="17" class="form-control" type='text'  id='localidade' name="localidade" value="{{$empresa->localidade or old('localidade')}}">  
                            </div>

                             <div class="form-group form-input">
                                <label class="form-label">Estado</label>
                                <input size="5" class="form-control" type='text' id='uf' name="uf" value="{{$empresa->uf or old('uf')}}">  
                            </div>
                        </div>    
                    </div>    
                    
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            
                            <div class="form-group form-input">
                                <label class="form-label">E-mail</label>
                                <input size="43" class="form-control" type='text' name="email" value="{{$empresa->email or old('email')}}">  
                            </div>
                            
                            <div class="form-group form-input">
                                <label class="form-label">Site</label>
                                <input size="43" class="form-control" type='text' name="site" value="{{$empresa->site or old('site')}}">  
                            </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">Telefone</label>
                                <input size="16" class="form-control" type='text' id="telefone"  name="telefone" value="{{$empresa->telefone or old('telefone')}}">  
                            </div>
                             
                            <div class="form-group form-input">
                                <label class="form-label">FAX</label>
                                <input size="16" class="form-control" type='text' id='fax' name="fax" value="{{$empresa->fax or old('fax')}}">  
                            </div>
                            
                            <div class="form-group form-input">
                                <label class="form-label">Celular</label>
                                <input size="16" class="form-control" type='text' id='celular' name="celular" value="{{$empresa->celular or old('celular')}}">  
                            </div>
                        </div>
                    </div>
                    
                    <hr>                   
                    <button class="btn btn-primary form-btns"> <span class="fa fa-save"></span></button>
                   
                </form>
            </div>
        </div>    
@endsection

@section('post-script')
     <script src="{{url('assets/all/js/buscalogradouro.js')}}"></script>
     <script src="{{url('assets/painel/js/uploadLogomarca.js')}}"></script>
     <script src="{{url('assets/painel/js/jquery.maskedinput.min.js')}}"></script>
@endsection