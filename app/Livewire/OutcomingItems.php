<?php

namespace App\Livewire;

use App\Livewire\Forms\OutcomingForm;
use App\Models\OutcomingItems as ModelsOutcomingItems;
use Livewire\Component;

class OutcomingItems extends Component
{
    public OutcomingForm $form;

    public function save() {
        $this->form->store();
    }

    public function render()
    {
        $outcomings = ModelsOutcomingItems::latest()->paginate(5);

        return view('livewire.outcoming-items', [
            'outcomings' => $outcomings
        ]);
    }
}
