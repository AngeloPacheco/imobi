<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Perfil;
use App\Http\Requests\Painel\PerfilFormRequest;

class PerfilController extends Controller
{
    
    private $perfil;
    private $totalPage = 10;
    
    public function __construct(Perfil $perfil){
        $this->perfil = $perfil;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = 'Perfil de clientes';
        $perfis =  $this->perfil->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.perfis.index', compact('title', 'perfis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $title = 'Novo perfil';
         return view('painel.perfis.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existePerfil($dataForm['descricao'])){

            $messagens = ['descricao.unique' => 'Perfil já cadastrado.'];

            $this->validate($request, ['descricao' => 'unique:perfis'], $messagens);
               
        }else{

            $insert = $this->perfil->create($dataForm);

            if ($insert) {
                return redirect('/painel/perfis');
            } else {
                return redirect()->route('painel.perfis.create-edit');
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
        $title = 'Editar perfil';
        $perfil = $this->perfil->find($id);
        return view('painel.perfis.create-edit',compact('perfil', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $perfil    = $this->perfil->find($id); 
        $update    = $perfil->update($dataForm);

         if( $update ){
            return redirect('/painel/perfis');
        }
            else{
            return redirect()->route('perfis.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $perfil = $this->perfil->find($id);
        $delete = $perfil->delete();
        
        if ($delete){
            return redirect('/painel/perfis');
        }    
        else {
            return redirect()->route('perfis.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
