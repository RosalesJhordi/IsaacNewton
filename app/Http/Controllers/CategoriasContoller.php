<?php

namespace App\Http\Controllers;

use App\Models\Uniformes;
use Illuminate\Http\Request;

class CategoriasContoller extends Controller
{
    public function index($tipo)
    {
        if ($tipo == "Descuento") {
            $datos = Uniformes::whereNotNull('descuento')->where('descuento', '<>', 0)->get();
            $filtro = $tipo;
            return view('Filtro', compact('datos', 'filtro'));
        } else {
            $datos = Uniformes::where('tipo', $tipo)->get();
            $filtro = $tipo;
            return view('Filtro', compact('datos', 'filtro'));
        }
    }
}
