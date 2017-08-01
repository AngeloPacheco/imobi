<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Cliente;
use App\Models\Painel\Perfil;
use App\Models\Painel\Imagem;
use App\Models\Painel\DocsCliente;
use App\Http\Requests\Painel\ClienteFormRequest;
use \Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    
    private $cliente;
    private $totalPage = 10;
    
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title    = 'Clientes';
        $clientes =  Cliente::orderBy('nome','asc')->paginate($this->totalPage);

        return view('painel.clientes.index', compact('title', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo cliente';
        $perfis = Perfil::orderBy('descricao','asc')->get();  
        return view('painel.clientes.create-edit', compact('title','perfis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $dataForm = $request->all();

        if (existeCliente($dataForm['cpf_cnpj'])){

            $messagens = ['cpf_cnpj.unique' => 'CPF ou CNPJ já cadastrada.'];

            $this->validate($request, ['cpf_cnpj' => 'unique:clientes'], $messagens);
               
        }else{

            $perfis = '';
            if(isset($dataForm['perfil'])){

                foreach ($dataForm['perfil'] as $key => $perfil) {
                    $perfis =  $perfis .','. $perfil;
                }
            }    
            $dataForm['perfil'] =  substr($perfis, 1 ); ;

            $insert = $this->cliente->create($dataForm);

            if(isset($request->photos)){ 

                foreach ($request->photos as $photo) {
                
                    $filename = $photo->store('public/img-clientes');
                    
                    $nm_imagem = substr($filename, 7 );
                    
                    Imagem::create([
                            'nm_imagem'     =>  $nm_imagem,
                            'titulo'        =>  $insert->nome,
                            'conteudo_id'   =>  $insert->id,
                            'conteudo_tipo' =>  'CL',
                            'path'          =>  '/public/img-clientes',
                        ]);
                }
            }
            
            if(isset($request->arquivos)){     

                $i = 0;
                foreach ($request->arquivos as $arquivo) {
                     
                     $arquivoName  = $arquivo->store('public/img-arquivos');
                     $nmArquivo    = substr($arquivoName, 7 );
                     
                     DocsCliente::Create([
                            'nm_arquivo' => $nmArquivo,
                            'descricao'  => $_FILES['arquivos']['name'][$i],
                            'cliente_id' => $insert->id,
                            'path'       => '/public/img-arquivos',
                        ]);
                    $i++;    
                }
            }    

            if ($insert) {
                return redirect('/painel/clientes');
            } else {
                return redirect()->route('painel.clientes.create-edit');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $title = 'Dados do Cliente';
        $cliente = $this->cliente->find($id);

         //echo '<pre>'; print_r($empresas);  '</pre>';

        $imagens = DB::table('imagens')
                        ->select('nm_imagem')
                        ->where([
                                    ['conteudo_id', '=', $id ],
                                    ['conteudo_tipo', '=', 'CL'],
                               ])
                       ->get();

         $docs = DB::table('docs_clientes')
                        ->select('docs_clientes.*')
                        ->where([
                                ['cliente_id', '=', $id ],
                               ])
                       ->get();               
             
        return view('painel.clientes.show', compact('title','cliente','imagens','docs')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar cliente';
        $cliente = $this->cliente->find($id);
        $perfilClientes = explode(",",$cliente->perfil);
        $perfis = Perfil::orderBy('descricao','asc')->get(); 
                
        $imagens = DB::table('imagens')
                        ->select('nm_imagem')
                        ->where([
                                    ['conteudo_id', '=', $id ],
                                    ['conteudo_tipo', '=', 'CL'],
                               ])
                       ->get();

          $docs = DB::table('docs_clientes')
                        ->select('docs_clientes.*')
                        ->where([
                                ['cliente_id', '=', $id ],
                               ])
                       ->get();                       
         

         $nm_imagem = substr($imagens, 29);               
         $nm_imagem = substr($nm_imagem, 0, -3);    

        return view('painel.clientes.create-edit',compact('cliente', 'title','nm_imagem','perfilClientes','perfis','docs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $cliente  = $this->cliente->find($id); 
        
        $perfis = '';
        if(isset($dataForm['perfil'])){

            foreach ($dataForm['perfil'] as $key => $perfil) {
                $perfis =  $perfis .','. $perfil;
            }
            
        }    
        $dataForm['perfil'] =  substr($perfis, 1 );

        $update = $cliente->update($dataForm);
         
        if(isset($request->photos)){ 
            foreach ($request->photos as $photo) {
                
                $filename = $photo->store('public/img-clientes');
                
                $nm_imagem = substr($filename, 7 );
                
                Imagem::where([
                                ['conteudo_id', '=', $id ],
                                ['conteudo_tipo', '=', 'CL'],
                            ])->Update(['nm_imagem' =>  $nm_imagem,]);
            }
        }    
        
        if( $update ){
            return redirect('/painel/clientes');
        }
            else{
            return redirect()->route('clientes.edit', $id)->with(['errors' => 'Erro ao editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);
        $delete = $cliente->delete();
        
        if ($delete){
            return redirect('/painel/clientes');
        }    
        else {
            return redirect()->route('clientes.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
    public function busca(Request $request){

        $title = "Pesquisa Clientes";

        $key = $request->input('descricao');

            $clientes = DB::table('clientes')
                     ->where('clientes.nome','like','%'. $key .'%')
                     ->orwhere('clientes.perfil','like','%'. $key .'%')
                     ->orwhere('clientes.cpf_cnpj','like','%'. $key .'%')
                     ->orwhere('clientes.localidade','like','%'. $key .'%')
                     ->orwhere('clientes.interesses','like','%'. $key .'%')
                     ->orderby('clientes.celular','asc')
                     ->Paginate($this->totalPage);
             
        if (count($clientes) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($clientes) . ' registro(s)';
            return view('painel.clientes.busca', compact('title','clientes','msg')); 
        
        }else{
        
            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';
            return view('painel.clientes.busca', compact('title', 'clientes','msg'));
        }    
    }
}
