<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoContoller;
use App\Http\Controllers\CategoriasContoller;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('Index');
});
Route::get('LogOut', [AuthController::class, 'logout'])->name('LogOut');
Route::get('Login', [AuthController::class, 'loginIndex'])->name('Login');
Route::post('Login', [AuthController::class, 'loginStore'])->name('Login.store');

Route::get('Registro', [AuthController::class, 'registroIndex'])->name('Registro');
Route::post('Registro', [AuthController::class, 'registroStore'])->name('Registro.store');
Route::get('Admin', [AdminController::class, 'index'])->name('AdminPanel');

Route::post('Tallas', [AdminController::class, 'datos'])->name('Tallas');

Route::get('Contacto', function () {
    return view('Contacto');
})->name('Contacto');

Route::get('Add', function () {
    $user = User::find(1);
    $pedidos = $user->unreadNotifications;
    return view('Admin.Add', compact('pedidos'));
})->name('Add');
Route::post('AddUniforme', [AdminController::class, 'datos'])->name('addUniforme');
Route::get('Editar/{id}', [EditContoller::class, 'index'])->name('Edit');
Route::post("Editar", [EditContoller::class, 'store'])->name('edit.store');
Route::get('Delete/{id}', [EditContoller::class, 'delete'])->name('delete');

Route::get('Categoria/{tipo}', [CategoriasContoller::class, 'index'])->name('Categorias');
Route::post('Carrito', [CarritoContoller::class, 'index'])->name('AddCarrito');
Route::get('Carrito',[PedidosController::class, 'show'])->name('Carrito');
Route::get('Pedidos',[PedidosController::class,'index'])->name('PedidosAdmin');

Route::get('Carrito/{id}',[PedidosController::class, 'delete'])->name('DeleteCar');
Route::post('Confirmar',[CarritoContoller::class, 'confirmar'])->name('Confirmar');
Route::get('Visorr/{id}',[PedidosController::class, 'visor'])->name('Visorr');

Route::post('Confirmarr',[PedidosController::class, 'confirmarpedido'])->name('Confirmarr');
Route::get('Cancelar/{id}',[PedidosController::class, 'cancelarpedidos'])->name('Cancelar');
Route::get('Visor/{id}',[ProductosController::class,'index'])->name('Visor');