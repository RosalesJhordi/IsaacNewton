<?php

namespace App\Livewire;

use App\Models\Uniformes;
use Livewire\Component;

class Buscador extends Component
{
    public $lista = false;
    public $search = "";
    public $resultados;

    public function searchProduct(){
        if(!empty($this->search)){
            $this->resultados = Uniformes::orderby('nombre','asc')
                ->select('*')
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->get();
            $this->lista = true;
        }else{
            $this->lista = false;
        }
    }

    public function render()
    {
        return view('livewire.buscador');
    }
}
