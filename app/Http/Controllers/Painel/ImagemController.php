<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ImagemController extends Controller
{
   public function index()
    {
        return view('painel.imagens.index');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/assets/painel/imgs/produtos'), $imageName);

        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }
}
