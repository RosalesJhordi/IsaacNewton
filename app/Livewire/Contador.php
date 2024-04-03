<?php

namespace App\Livewire;

use App\Models\Uniformes;
use Livewire\Component;

class Contador extends Component
{
    public $contador = 1;
    public $id;
    public $s = false;
    public $m = false;
    public $tallasSelecionar;
    public $tallas;

    public function mount($id)
    {
        $this->id = $id;
        $this->tallasSelecionar = Uniformes::where('id', $this->id)->first();
        $this->tallas = explode(",", $this->tallasSelecionar->tallas);
    }
    public function mayor()
    {
        $this->contador++;
    }
    public function menor()
    {
        $this->contador = max(1, $this->contador - 1);
    }
    public function render()
    {
        return view('livewire.contador');
    }
}
