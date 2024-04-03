<?php

namespace App\Livewire;

use App\Models\Pedidos;
use Livewire\Component;

class VendidosAdmin extends Component
{
    public $vendidos;

    public function mount(){
        $this->vendidos = Pedidos::where('estado', 'Pagado')->sum('cantidad');
    }
    public function render()
    {
        return view('livewire.vendidos-admin');
    }
}
