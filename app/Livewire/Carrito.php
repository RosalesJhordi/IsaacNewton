<?php

namespace App\Livewire;

use App\Models\Pedidos;
use Livewire\Component;

class Carrito extends Component
{
    public $car;

    public function update(){
        $pedidos = Pedidos::where('id_cliente', auth()->user()->id)
                  ->where(function ($query) {
                      $query->whereNull('confirmado')
                            ->orWhere('confirmado', "False");
                  })
                  ->first();
        if($pedidos != null){
           $this->car = $pedidos->count(); 
        }
    }
    public function render()
    {
        $this->update();
        return view('livewire.carrito');
    }
}
