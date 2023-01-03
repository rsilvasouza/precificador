<?php

namespace App\Http\Controllers;

use App\Models\NFe;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index(NFe $nfe, Request $request)
    {

        $lista = $nfe->listaNFe(true);

        if (!in_array($request->nfe, $lista)) return "erro";

        $xml = simplexml_load_file($request->nfe);

        return view('nota.index')->with('nota', $xml->NFe->infNFe->det);
    }

    public function show(Request $request)
    {
        $lista = [];

        for ($i = 1; $i <= $request->input('total'); $i++) {
            if (!empty($request->input('vSugerido' . $i))) {
                $item = [
                    'nome' => $request->input('nomeItem' . $i),
                    'preco' => $request->input('vSugerido' . $i)
                ];
                array_push($lista, $item);
            }
        }

        return view('nota.show')->with('tabela', $lista);
    }
}
