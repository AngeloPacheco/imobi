<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\FormaPagto;
use App\Http\Requests\Painel\FormaPagtoFormRequest;

class FormaPagtoController extends Controller
{
    private $formaPagto;
    private $totalPage = 10;
    
    public function __construct(FormaPagto $formaPagto){
        $this->formaPagto = $formaPagto;
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'Forma de pagamentos';
        $formaPagtos =  $this->formaPagto->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.forma-de-pagamentos.index', compact('title', 'formaPagtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $title  = 'Forma de pagamentos';
       return view('painel.forma-de-pagamentos.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormaPagtoFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existeFormaPagto($dataForm['descricao'])){

            $messagens = ['descricao.unique' => 'Forma de pagamento já cadastrada.'];

            $this->validate($request, ['descricao' => 'unique:forma_pagtos'], $messagens);
               
        }else{

            $insert = $this->formaPagto->create($dataForm);

            if ($insert) {
                return redirect('/painel/forma-de-pagamentos');
            } else {
                return redirect()->route('painel.forma-de-pagamentos.create-edit');
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
        $title = 'Editar Forma de pagamento';
        $formaPagto = $this->formaPagto->find($id);
        return view('painel.forma-de-pagamentos.create-edit',compact('formaPagto', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormaPagtoFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $formaPagto = $this->formaPagto->find($id); 
        $update    = $formaPagto->update($dataForm);

         if( $update ){
            return redirect('/painel/forma-de-pagamentos');
        }
            else{
            return redirect()->route('forma-de-pagamentos.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $formaPagto = $this->formaPagto->find($id);
        $delete = $formaPagto->delete();
        
        if ($delete){
            return redirect('/painel/forma-de-pagamentos');
        }    
        else {
            return redirect()->route('forma-de-pagamentos.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
