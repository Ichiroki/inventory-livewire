<?php

namespace App\Livewire\Barang\Masuk;

use App\Livewire\Forms\BarangForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public BarangForm $form;

    public function save() {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.barang.masuk.create');
    }
}
