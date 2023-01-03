<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFeFormRequest;
use App\Models\NFe;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class NFeController extends Controller
{
    
    public function index(NFe $nFe)
    {

        $lista = $nFe->listaNFe(false);
       
        return view('nfe.index')->with('lista',$lista);

    }

    public function upload(Nfe $nFe, NFeFormRequest $request)
    {
        $xml = simplexml_load_file($request->nfe);
        $nome = date('d_m_Y',  strtotime($xml->NFe->infNFe->ide->dhEmi)) . '_' . $xml->NFe->infNFe->emit->xNome . '_' . $xml->NFe->infNFe->ide->nNF;
        
        $request->file('nfe')->storeAs('public/NF',$nome);
        $mensagemSucesso = session('mensagem.sucesso');

        return to_route('nfe');

        
    }
   

}
