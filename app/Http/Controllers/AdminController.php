<?php

namespace App\Http\Controllers;

use App\Models\Uniformes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $datos = Uniformes::all();
        return view('Admin.Inicio', compact('datos'));
    }

    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nomImage = Str::uuid() . "." . $imagen->extension();
        $imgServe = Image::make($imagen);
        // $imgServe->fit(1000,1000);

        $imgPath = public_path('ServidorImagenes') . '/' . $nomImage;
        $imgServe->save($imgPath);

        return response()->json(['imagen' => $nomImage]);
    }

    public function datos(Request $request)
    {
        $nombre = $request->nombre;

        if ($nombre == "Pantalon" || $nombre == "Polo con cuello V" || $nombre == "Gorro plomo"  || $nombre == "Polera" || $nombre == "Medias") {
            Uniformes::create([
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                'tallas' => $request->tallas,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'tipo' => "Formal",
                'imagen' => $request->imagen,
            ]);
        } else {
            Uniformes::create([
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                'tallas' => $request->tallas,
                'precio' => $request->precio,
                'descuento' => $request->descuento,
                'tipo' => "Deportivo",
                'imagen' => $request->imagen,
            ]);
        }

        return back()->with('mensaje','Producto agregado exitosamnete');
    }
}
