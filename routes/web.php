<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Index');
});
Route::get('LogOut',[AuthController::class, 'logout'])->name('LogOut');
Route::get('Login',[AuthController::class,'loginIndex'])->name('Login');
Route::post('Login',[AuthController::class, 'loginStore'])->name('Login.store');

Route::get('Registro',[AuthController::class,'registroIndex'])->name('Registro');
Route::post('Registro',[AuthController::class,'registroStore'])->name('Registro.store');
Route::get('Admin',[AdminController::class,'index'])->name('AdminPanel');

Route::post('Imagen',[AdminController::class,'store'])->name('Imagen');
Route::post('Tallas',[AdminController::class, 'datos'])->name('Tallas');

Route::get('Contacto', function(){
    return view ('Contacto');
})->name('Contacto');

Route::get('Add', function(){
    return view ('Admin.Add');
})->name('Add');
Route::post('AddUniforme',[AdminController::class, 'datos'])->name('addUniforme');