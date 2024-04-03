<?php

namespace App\Livewire;

use App\Models\Pedidos;
use Livewire\Component;

class GananciaAdmin extends Component
{
    public $ganancia;
    public function mount(){
        $this->ganancia = Pedidos::where('estado', 'Pagado')->sum('total');
    }
    public function render()
    {
        return view('livewire.ganancia-admin');
    }
}
