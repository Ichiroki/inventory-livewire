<?php

namespace App\Livewire;

use App\Livewire\Forms\IncomingForm;
use App\Models\Barang;
use App\Models\Incoming as ModelsIncoming;
use Livewire\Component;

class Incoming extends Component
{
    public IncomingForm $form;

    public function save() {
        $this->form->store();
    }

    public function render()
    {
        $incomings = ModelsIncoming::with(['item'])->get();
        $items = Barang::all();

        // dd($incomings);

        return view('livewire.incoming', [
            'incomings' => $incomings,
            'items' => $items
        ]);
    }
}
