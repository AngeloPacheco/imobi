<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\EmpresaFormRequest;
use App\Models\painel\Empresa;
use App\Models\Painel\Imagem;
use \Illuminate\Support\Facades\DB;


class EmpresaController extends Controller {
    
    private  $empresa;
    private  $totalPage = 10;    

    public function __construct(Empresa $empresa) {
        
        $this->empresa = $empresa;
    }
    
    
    public function index()
    {
         $title = 'Empresa';
                
         $empresas = $this->empresa->orderBy('razao_social','asc')->paginate($this->totalPage);

         //echo '<pre>'; print_r($empresas);  '</pre>';

        if (count ($empresas ) > 0) {
             
            $imagens = Imagem::where('conteudo_tipo', 'L')->get();
             
            return view('painel.empresa.show', compact('title','empresas','imagens')); 
        
        }
         else {
        
            return view('painel.empresa.index', compact('title','empresas'));  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Empresa';
        return view('painel.empresa.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaFormRequest $request)
    {
        $dataForm = $request->all();
        
        $insert = $this->empresa->create($dataForm);
        
        foreach ($request->photos as $photo) {
            
            $filename = $photo->store('public/img-empresa');
            
            $nm_imagem = substr($filename, 7 );
            
            Imagem::create([
                    'nm_imagem'     =>  $nm_imagem,
                    'titulo'        =>  'Logomarca',
                    'conteudo_id'   =>  $insert->id,
                    'conteudo_tipo' =>  'L',
                    'path'          =>  '/public/img-empresa',
            ]);
        }
        if ($insert) {
            return redirect('/painel/empresa');
        } else {
            return redirect()->route('painel.empresa.create-edit');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = $this->empresa->find($id);
        
        $title = 'Editar imobiliária';
        
        $imagens = DB::table('imagens')
                        ->select('nm_imagem')
                        ->where([
                                    ['conteudo_id', '=', $id ],
                                    ['conteudo_tipo', '=', 'L'],
                               ])
                       ->get();

         $nm_imagem = substr($imagens, 28);               
         $nm_imagem = substr($nm_imagem, 0, -3);               

        return view('painel.empresa.create-edit',compact('empresa', 'title','nm_imagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormRequest $request, $id)
    {
        $dataForm   = $request->all();
        $empresa    = $this->empresa->find($id); 
        $update     = $empresa->update($dataForm);

        
         foreach ($request->photos as $photo) {
            
            $filename = $photo->store('public/img-empresa');
            
            $nm_imagem = substr($filename, 7 );
            
            Imagem::where('conteudo_tipo','=','L')->Update(['nm_imagem' =>  $nm_imagem,]);
        }

        if( $update ){
            return redirect('/painel/empresa');
        }
            else{
            return redirect()->route('empresa.edit', $id)->with(['errors' => 'Erro ao editar.']);
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
        //
    }
}
