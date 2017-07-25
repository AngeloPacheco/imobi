<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\CategoriaImovel;
use App\Http\Requests\Painel\CategoriaImovelFormRequest;

class CategoriaImovelController extends Controller
{
    
    private $categoria;
    private $totalPage = 10;
    
    public function __construct(CategoriaImovel $categoria){
        $this->categoria = $categoria;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'Categoria de imóveis';
        $categorias =  $this->categoria->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.categoria-imoveis.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $title = 'Nova categoria de imóveis';
         return view('painel.categoria-imoveis.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaImovelFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existeCategoriaImovel($dataForm['descricao'])){

            $messagens = ['descricao.unique' => 'Categoria já cadastrada.'];

            $this->validate($request, ['descricao' => 'unique:categoria_imoveis'], $messagens);
               
        }else{

            $insert = $this->categoria->create($dataForm);

            if ($insert) {
                return redirect('/painel/categoria-imoveis');
            } else {
                return redirect()->route('painel.categoria-imoveis.create-edit');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Categoria de imóveis';
        $categoria = $this->categoria->find($id);
        return view('painel.categoria-imoveis.create-edit',compact('categoria', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm  = $request->all();
        $categoria = $this->categoria->find($id); 
        $update    = $categoria->update($dataForm);

         if( $update ){
            return redirect('/painel/categoria-imoveis');
        }
            else{
            return redirect()->route('categoria-imoveis.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $categoria = $this->categoria->find($id);
        $delete = $categoria->delete();
        
        if ($delete){
            return redirect('/painel/categoria-imoveis');
        }    
        else {
            return redirect()->route('categoria-imoveis.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
