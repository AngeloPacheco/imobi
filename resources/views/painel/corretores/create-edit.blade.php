@extends('painel.index')
@section('content')

    @if ( isset($corretor))
        
        <h1 class='painel-title'>Corretores - Editar dados</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('corretores.update', $corretor->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Corretores - Novo corretor</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('corretores.store')}}" enctype="multipart/form-data">    
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
                                <label class="form-label">Nome</label>
                                <input size="43" class="form-control" type='text' name="nome" value="{{$corretor->nome or old('nome')}}" autofocus="">  
                            </div><br>

                            <div class="foto-corretor-cadastro">
                                @if ( isset ($nm_imagem))
                                    <h3>Foto do corretor</h3>
                                    <div  id="foto">
                                       <img class="img-thumbnail renderiza-fotos-cadastro" src="{{url('storage/img-corretores') . '/' . $nm_imagem}}">      
                                    </div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary btn-foto-corretor'>Selecionar</label>                        
            
                                @else              
                                    <h3>Foto do corretor</h3>
                                    <div id="foto"></div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary btn-foto-corretor'>Selecionar</label>

                                @endif  
                             </div>       


                            <div class="form-group form-input">
                                <label class="form-label">CRECI</label>
                                <input size="10" class="form-control" type='text' name="creci" value="{{$corretor->creci or old('creci')}}">  
                            </div><br>
                            
                            <div class="form-group form-input">
                                <label class="form-label">Telefone Residencial</label>
                                <input size="15" class="form-control" type='text' id="fone_res" name="fone_res" value="{{$corretor->fone_res or old('fone_res')}}">  
                            </div><br>

                             <div class="form-group form-input">
                                <label class="form-label">Telefone Comercial</label>
                                <input size="15" class="form-control" type='text' id="fone_com" name="fone_com" value="{{$corretor->fone_com or old('fone_com')}}">  
                            </div>

                             <div class="form-group form-input">
                                <label class="form-label">Ramal</label>
                                <input size="5" class="form-control" type='text' name="ramal" value="{{$corretor->ramal or old('ramal')}}">  
                            </div><br>

                            <div class="form-group form-input">
                                <label class="form-label">Celular</label>
                                <input size="15" class="form-control" type='text' id="celular" name="celular" value="{{$corretor->celular or old('celular')}}">  
                            </div><br>


                            <div class="form-group form-input">
                                <label class="form-label">E-mail</label>
                                <input size="40" class="form-control" type='email' name="email" value="{{$corretor->email or old('email')}}">  
                            </div><br>

                           <div class="form-group form-input">
                                <label class="form-label">Comissão</label>
                                <input size="16" class="form-control placeholder-right"  type='text' name="comissao" value="{{$corretor->comissao or old('comissao')}}" placeholder="0,00%">  
                            </div>

                        </div>  
                    </div>
                     
                    <a href="{{url('/painel/corretores')}}" class="btn btn-primary form-btns" title="Voltar">
                        <span class="fa fa-reply"></span> 
                    </a>
                    <button class="btn btn-primary form-btns"> <span class="fa fa-save"></span></button>
                </form>  
            </div>
        </div>    
@endsection

@section('post-script')
     <script src="{{url('assets/painel/js/uploadFotoCorretor.js')}}"></script>
     <script src="{{url('assets/painel/js/jquery.maskedinput.min.js')}}"></script>
@endsection                          