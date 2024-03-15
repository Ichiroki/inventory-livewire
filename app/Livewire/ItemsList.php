<?php

namespace App\Livewire;

use App\Livewire\Forms\BarangForm;
use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class ItemsList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public BarangForm $form;

    public $search = '';

    public function save() {
        $this->form->store();
    }

    public function render()
    {
        if($this->search) {
            $barangs = Barang::where('name', 'like', '%'. $this->search . '%')->paginate(5);
        } else {
            $barangs = Barang::latest()->paginate(5);
        }

        return view('livewire.items-list', [
            'barangs' => $barangs
        ]);
    }
}
