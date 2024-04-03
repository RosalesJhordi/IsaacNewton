<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Uniformes;
use App\Models\User;
use App\Notifications\NuevoPedido;
use Illuminate\Http\Request;

class CarritoContoller extends Controller
{
    public function index(Request $request)
    {
        $producto = Uniformes::where('id', $request->id)->first();
        $cantidad = $producto->precio * $request->cantidad;
        Pedidos::create([
            'id_producto'   => $request->id,
            'cantidad'      => $request->cantidad,
            'talla'         =>  $request->talla,
            'id_cliente'    => auth()->user()->id,
            'confirmado'    => "False",
            'total'         => $cantidad,
        ]);

        return back()->with('mensaje', 'Producto agregado al carrito');
    }

    public function confirmar(Request $request){
        $ids_pedidos = $request->input('ids_pedidos');
        if (!$ids_pedidos) {
            return redirect()->back()->with('error', 'No se proporcionaron pedidos para marcar como pagados.');
        }
        Pedidos::whereIn('id', $ids_pedidos)->update(['confirmado' => "True",]);

        $adminId = 1;
        $pedidoId = $request->id;
        $userId = auth()->user()->id;

        $admin = User::find($adminId);
        $admin->notify(new NuevoPedido($pedidoId, $userId));

        return back()->with('mensaje', 'Productos confirmados');
    }
}
