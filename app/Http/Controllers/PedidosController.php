<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PedidosController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $pedidos = $user->unreadNotifications;

        $datos = Pedidos::where('confirmado', "True")
            ->whereNull('estado')
            ->select('id_cliente', DB::raw('count(*) as total'), DB::raw('SUM(total) as total_suma'))
            ->groupBy('id_cliente')
            ->get();
        return view('Admin.Pedidos', compact('pedidos', 'datos'));
    }

    public function show()
    {
        // $base_url_yape = 'https://yape.pe/';

        // $amount = 10.50;
        // $description = 'Pago de compra en tienda en línea';
        // $payment_link = $base_url_yape . '?amount=' . $amount . '&description=' . urlencode($description);
        // $google_qr_url = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($payment_link);

        $pedidos = Pedidos::where('id_cliente', auth()->user()->id)
            ->where(function ($query) {
                $query->whereNull('confirmado')
                    ->orWhere('confirmado', "False");
            })
            ->get();
        return view('ShowCarrito', compact('pedidos'));
    }

    public function delete($id)
    {
        $pedidos = Pedidos::find($id);
        $pedidos->delete();
        return back()->with('mensaje', "Producto eliminado del carrito");
    }

    public function visor($id)
    {
        $user = User::find(1);
        $pedidos = $user->unreadNotifications;

        $datos = Pedidos::where('id_cliente', auth()->user()->id)
                ->whereNull('estado')
                ->get();
        // auth()->user()->unreadNotifications->markAsRead();
        return view('Admin.Visor', compact('pedidos', 'datos'));
    }

    //admin

    public function cancelarpedidos($id)
    {
        Pedidos::where('id', $id)->update(['estado' => "Cancelado"]);
        return back()->with('mensaje', 'Productos Cancelados');
    }

    public function confirmarpedido(Request $request)
    {
        $ids_pedidos = $request->input('ids_pedidos');
        if (!$ids_pedidos) {
            return redirect()->back()->with('error', 'No se proporcionaron pedidos para marcar como pagados.');
        }

        Pedidos::whereIn('id', $ids_pedidos)->update(['estado' => "Pagado",]);
        auth()->user()->unreadNotifications->markAsRead();
        
        return back()->with('mensaje', 'Productos confirmados');
    }
}
