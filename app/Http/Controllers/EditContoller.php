<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uniformes;
use Illuminate\Http\Request;

class EditContoller extends Controller
{
    public function index($id){
        $datos = Uniformes::find($id);
        $user = User::find(1);
        $pedidos = $user->unreadNotifications;
        return view('Admin.Edit', compact('datos','pedidos'));
    }

    public function store(Request $request){

        $uniforme = Uniformes::where('id', $request->id)->first();
        $uniforme->nombre = $request->nombre;
        $uniforme->cantidad = $request->cantidad;
        $uniforme->precio = $request->precio;
        $uniforme->descuento = $request->descuento;

        $uniforme->save();
        return back()->with('mensaje', 'Actualizado correctamente');
    }

    public function delete($id){
        $uniforme = Uniformes::where('id', $id)->first();
        $uniforme->delete();
        return back()->with('mensaje', 'Eliminado correctamente');
    }
}
