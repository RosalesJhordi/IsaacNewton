<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Uniformes;
use Livewire\WithPagination;

class Productos extends Component
{
    use WithPagination;

    public function render()
    {
        $uniformes = Uniformes::paginate(9);
        return view('livewire.productos',[
            'uniformes' => $uniformes
        ]);
    }
}
