<?php

namespace App\Livewire;

use App\Livewire\Forms\OutcomingForm;
use App\Models\Barang;
use App\Models\OutcomingItems as ModelsOutcomingItems;
use Livewire\Component;

class OutcomingItems extends Component
{
    public OutcomingForm $form;

    public function save() {
        $this->form->store();
    }

    public function delete($id) {
        ModelsOutcomingItems::where('id', $id)->delete();

        $this->reset();
    }

    public function render()
    {
        $outcomings = ModelsOutcomingItems::with(['item'])->latest()->paginate(5);
        $items = Barang::all();

        return view('livewire.outcoming-items', [
            'outcomings' => $outcomings,
            'items' => $items
        ]);
    }
}
