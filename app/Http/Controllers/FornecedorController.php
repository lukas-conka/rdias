<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
     
    public function index($id = null)
    {

        if($id == null){
            return Fornecedor::orderBy('id', 'asc')->get();
        }else{
            return $this->show($id);
        }
    }


    public function store(Request $request)
    {
        $fornecedor = new Fornecedor;
        $fornecedor->fornecedorName = $request->input('fornecedorName');
        $fornecedor->fornecedorEmail = $request->input('fornecedorEmail');
        $fornecedor->fornecedorContact = $request->input('fornecedorContact');
        $fornecedor->fornecedorPosition = $request->input('fornecedorPosition');

        $fornecedor->save();
        return 'Fornecedor gravado com sucesso criado com Id '.$fornecedor->id;
    }

    
    public function show($id)
    {
        return Fornecedor::find($id);
    }


    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->fornecedorName = $request->input('fornecedorName');
        $fornecedor->fornecedorEmail = $request->input('fornecedorEmail');
        $fornecedor->fornecedorContact = $request->input('fornecedorContact');
        $fornecedor->fornecedorPosition = $request->input('fornecedorPosition');

        $fornecedor->save();
        return 'Fornecedor gravado com sucesso editado com Id '.$fornecedor->id;
    }

  
    public function delete($id)
    {
        $fornecedor = Fornecedor::find($id)->delete();

        return 'Registro deletado com sucesso';
    }
}
