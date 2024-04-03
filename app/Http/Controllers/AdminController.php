<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uniformes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $imagen = $request->file('imagen');

        $nomImage = Str::uuid() . "." . $imagen->extension();
        $imgServe = Image::make($imagen);

        $imgPath = public_path('ServidorImagenes') . '/' . $nomImage;
        $imgServe->save($imgPath);

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
                'imagen' => $nomImage,
            ]);
        } else {
            Uniformes::create([
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                'tallas' => $talla,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'tipo' => "Deportivo",
                'imagen' => $nomImage,
            ]);
        }

        return back()->with('mensaje', 'Producto agregado exitosamnete');
    }
}
