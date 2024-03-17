<?php

namespace App\Livewire;

use App\Livewire\Forms\OutcomingForm;
use App\Models\Barang;
use App\Models\OutcomingItems as ModelsOutcomingItems;
use Livewire\Component;

class OutcomingItems extends Component
{
    public OutcomingForm $form;

    public $search;

    public function save() {
        $this->form->store();
    }

    public function delete($id) {
        $itemsQty = ModelsOutcomingItems::where('item_id', $id)->first();

        $items = Barang::findOrFail($id);

        $oldQuantity = $items->quantity + $itemsQty->quantity;

        $items->update(['quantity' => $oldQuantity]);

        ModelsOutComingItems::where('item_id', $id)->delete();

        $this->reset();
    }

    public function render()
    {
        $query = ModelsOutcomingItems::query();
        if($this->search) {
            $query->whereHas('item', function($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $outcomings = $query->with(['item'])->latest()->paginate(5);
        $items = Barang::all();

        return view('livewire.outcoming-items', [
            'outcomings' => $outcomings,
            'items' => $items
        ]);
    }
}
