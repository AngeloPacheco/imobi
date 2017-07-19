<!DOCTYPE html>
<html>
    <head>
    
      <title>{{$title or ''}} | Imobi</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       <!-- bootstrap-->
      <link rel="stylesheet" href="{{url('assets/all/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}"/>
      <link rel="stylesheet" href="{{url('assets/painel/css/menu.css')}}"/>
      <link rel="stylesheet" href="{{url('assets/all/css/font-awesome.min.css')}}"/>
      <link rel="shortcut icon" href="{{url('assets/painel/imgs/tag.png')}}" type="image/x-icon" />
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
      <script src="{{url('assets/all/js/jquery-3.2.1.min.js')}}"></script>


    </head>
    <body>
      <div class="topo">
        <div class="dropdown user">
           <div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               <img src="{{url('assets\painel\imgs\img-user.jpg')}}" alt="usuario" class="user img-circle">
               <p class="user-name">Nome do Usuário</p>
               <span class="caret"></span>
           </div>
           <ul class="dropdown-menu dp-menu" aria-labelledby="dropdownMenu1">
               <li><a href="#">Perfil</a></li>
               <li><a href="#">Sair</a></li>
           </ul>
        </div>
      </div>
       
        

        <div class="container">
    	    <div class="row">
    		   
    		    <div id="wrapper">
                   <!-- Sidebar -->
                   <div id="sidebar-wrapper">
                        
                        <img src="{{url('assets\painel\imgs\logo.png')}}" alt="logomarca" class="logo">

                        <ul class="sidebar-nav painel-navbar" style="margin-left:0;">
                            <li class="sidebar-brand">
                        
                                <a class="painel-fa" href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i></a>
                        
                            </li>
                            
                            <li>
                                <a class="painel-fa" href="{{url('painel/')}}" title="Página inicial"><i class="fa fa-home" aria-hidden="true"> </i> <span style="margin-left:10px;">Home</span>  </a>
                            </li>
                            
                            <li>
                                <a class="painel-fa" href="{{url('painel/produtos')}}" title="Produtos"> <i class="fa fa-dropbox " aria-hidden="true"> </i> <span style="margin-left:10px;">Produtos</span> </a>
                            </li>
                            
                            <li>
                                <a class="painel-fa" href="{{url('painel/fornecedores')}}" title="Fornecedores"> <i class="fa fa-industry" aria-hidden="true"> </i> <span style="margin-left:10px;"> Fornecedores</span> </a>
                            </li>

                             <li>
                                <a class="painel-fa" href="{{url('painel/compras')}}" title="Compras de produtos"> <i class="fa fa-shopping-cart" aria-hidden="true"> </i> <span style="margin-left:10px;"> Compras</span> </a>
                            </li>

                            <li>
                                <a class="painel-fa" href="{{url('painel/configuracoes')}}" title="Configurações do sistema"> <i class="fa fa-cog" aria-hidden="true"> </i> <span style="margin-left:10px;"> Configurações</span> </a>
                            </li>
                    
                        </ul>
                    </div>
                    
                    <div id="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <script>
                                        
                                        $("#menu-toggle").click(function(e) {
                                           e.preventDefault();
                                           $("#wrapper").toggleClass("toggled");
                                        });
                                       
                                    </script>
        	                    </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
            </div>


        <div class='container'>
             @yield('content')
        </div>   
        <!--fim container-->
    </body>

        <!-- Jquery -->
        
        <script src="{{url('assets/painel/js/jquery-ui.js')}}"></script>
        <!-- JS Bootstrap -->
        <script src="{{url('assets/all/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/painel/js/jquery.maskedinput.min.js')}}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
         

 </html>    

 @yield('post-script-logradouros')
 @yield('uploadLogomarca')
 @yield('uploadImagensProdutos')
 @yield('CalculoPrecoProduto')
 @yield('setar-datas')