<?php

namespace App\Http\Controllers;

use App\Models\Uniformes;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index($id){
        $uniformes = Uniformes::where('id', $id)->get();
        return view('VisorProducto',compact('uniformes'));
    }
}
