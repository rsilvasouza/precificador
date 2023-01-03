<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFe extends Model
{
    protected $caminho = __DIR__ . '/../../storage/app/public/NF';

    use HasFactory;

    //Service provider?
    public function listaNFe(bool $merge)
    {
        $pasta = dir($this->caminho);

        $lista = [];

        while ($arquivo = $pasta->read()) {
            if ($merge) {
                $array = $this->caminho . "/" . $arquivo;
            } else {
                $array = ['caminho' => $this->caminho, 'arquivo' => $arquivo];
            }

            array_push($lista, $array);
        }
        return $lista;
    }
}
