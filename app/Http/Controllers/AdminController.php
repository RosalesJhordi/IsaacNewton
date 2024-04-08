<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uniformes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $pedidos = $user->unreadNotifications;
        $datos = Uniformes::all();
        return view('Admin.Inicio', compact('datos','pedidos'));
    }
    public function datos(Request $request)
    {
        $image              = $request->file('imagen');
        $imageName          = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $destinationPath    = public_path('ServidorImagenes');
        $image->move($destinationPath, $imageName);

        $nombre = $request->nombre;
        $talla = implode(',', $request->tallas);

        if ($nombre == "Camisa" || $nombre == "Polo con cuello V" || $nombre == "Pullover" || $nombre == "Pantalón"  || $nombre == "Casaca" || $nombre == "Medias" || $nombre == "Blusa") {
            Uniformes::create([
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                'tallas' => $talla,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'tipo' => "Formal",
                'imagen' => $imageName,
            ]);
        } else {
            Uniformes::create([
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                'tallas' => $talla,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'tipo' => "Deportivo",
                'imagen' => $imageName,
            ]);
        }

        return back()->with('mensaje', 'Producto agregado exitosamnete');
    }
}
