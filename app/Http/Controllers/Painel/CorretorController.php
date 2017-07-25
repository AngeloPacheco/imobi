<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Corretor;
use App\Http\Requests\Painel\CorretorFormRequest;
use App\Models\Painel\Imagem;
use \Illuminate\Support\Facades\DB;

class CorretorController extends Controller
{
     
    private $corretor;
    private $totalPage = 10;
    
    public function __construct(Corretor $corretor){
        $this->corretor = $corretor;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'Corretores';
        $corretores =  $this->corretor->orderBy('nome','asc')->paginate($this->totalPage);
        return view('painel.corretores.index', compact('title', 'corretores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $title = 'Novo corretor';
         return view('painel.corretores.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorretorFormRequest $request)
    {
        $dataForm = $request->all();
        
         if ( existeCorretor($dataForm['nome'],$dataForm['creci']) ){

            $messagens = ['nome.unique' => 'Corretor já cadastrado',
                          'creci.unique' => 'CRECI já cadastrado'
                         ];

            $this->validate($request, [
                'nome' => 'unique:corretores',
                'creci' => 'unique:corretores'
             ], $messagens);
               
        }else{

            $insert = $this->corretor->create($dataForm);

            foreach ($request->photos as $photo) {
            
            $filename = $photo->store('public/img-corretores');
            
            $nm_imagem = substr($filename, 7 );
            
            Imagem::create([
                    'nm_imagem'     =>  $nm_imagem,
                    'titulo'        =>  'Corretor',
                    'conteudo_id'   =>  $insert->id,
                    'conteudo_tipo' =>  'C',
                    'path'          =>  '/public/img-corretores',
                ]);
            }
            if ($insert) {
                return redirect('/painel/corretores');
            } else {
                return redirect()->route('painel.corretores.create-edit');
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
        $title = 'Corretor';
                
        $corretor = $this->corretor->find($id);

         //echo '<pre>'; print_r($empresas);  '</pre>';

        $imagens = DB::table('imagens')
                        ->select('nm_imagem')
                        ->where([
                                    ['conteudo_id', '=', $id ],
                                    ['conteudo_tipo', '=', 'C'],
                               ])
                       ->get();
             
        return view('painel.corretores.show', compact('title','corretor','imagens')); 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corretor = $this->corretor->find($id);
        
        $title = 'Editar corretor';
        
        $imagens = DB::table('imagens')
                        ->select('nm_imagem')
                        ->where([
                                    ['conteudo_id', '=', $id ],
                                    ['conteudo_tipo', '=', 'C'],
                               ])
                       ->get();


         $nm_imagem = substr($imagens, 30);               
         $nm_imagem = substr($nm_imagem, 0, -3);               

        return view('painel.corretores.create-edit',compact('corretor', 'title','nm_imagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CorretorFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $corretor   = $this->corretor->find($id); 
        $update   = $corretor->update($dataForm);

        foreach ($request->photos as $photo) {
            
            $filename = $photo->store('public/img-corretores');
            
            $nm_imagem = substr($filename, 7 );
            
            Imagem::where([
                            ['conteudo_id', '=', $id ],
                            ['conteudo_tipo', '=', 'C'],
                        ])->Update(['nm_imagem' =>  $nm_imagem,]);
        }
        
        if( $update ){
            return redirect('/painel/corretores');
        }
            else{
            return redirect()->route('corretores.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $corretor = $this->corretor->find($id);
        $delete = $corretor->delete();
        
        if ($delete){
            return redirect('/painel/corretores');
        }    
        else {
            return redirect()->route('corretores.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
