<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Infra;
use App\Http\Requests\Painel\InfraFormRequest;


class InfraController extends Controller
{
    
   private $infra;
   private $totalPage = 10;
    
    public function __construct(Infra $infra){
        $this->infra = $infra;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $title  = 'Infraestruturas';
        $infras =  Infra::orderBy('descricao','asc')->paginate($this->totalPage);

        return view('painel.infraestruturas.index', compact('title', 'infras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova Infraestrutura';
        return view('painel.infraestruturas.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfraFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existeInfra($dataForm['descricao'])){

            $messagens = ['descricao.unique' => 'Infraestrutura já cadastrada.'];

            $this->validate($request, ['descricao' => 'unique:infras'], $messagens);
               
        }else{

            $insert = $this->infra->create($dataForm);

            if ($insert) {
                return redirect('/painel/infraestruturas');
            } else {
                return redirect()->route('painel.infraestruturas.create-edit');
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
        $title = 'Editar Infraestrutura';
        $infra = $this->infra->find($id);
        return view('painel.infraestruturas.create-edit',compact('infra', 'title'));
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
        $dataForm = $request->all();
        $infra    = $this->infra->find($id); 
        $update   = $infra->update($dataForm);

         if( $update ){
            return redirect('/painel/infraestruturas');
        }
            else{
            return redirect()->route('infraestruturas.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $infra  = $this->infra->find($id);
        $delete = $infra->delete();
        
        if ($delete){
            return redirect('/painel/infraestruturas');
        }    
        else {
            return redirect()->route('infraestruturas.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
