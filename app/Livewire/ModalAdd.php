<?php

namespace App\Livewire;

use Livewire\Component;

class ModalAdd extends Component
{
    public $message;
    public $mss;
    public $imagen = "";

    public function mount()
    {
        $this->message = "";
    }

    public function updateImg(){
        $this->imagen = strtoupper($this->imagen);
    }

    public function render()
    {
        return view('livewire.modal-add');
    }
}
