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

    public function delete($id) {
        ModelsIncoming::where('item_id', $id)->delete();

        $this->reset();
    }

    public function render()
    {
        $incomings = ModelsIncoming::with(['item'])->latest()->paginate(5);
        $items = Barang::all();

        return view('livewire.incoming', [
            'incomings' => $incomings,
            'items' => $items
        ]);
    }
}
