<?php

namespace App\Livewire;

use App\Livewire\Forms\BarangForm;
use App\Models\Barang;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class BarangMasuk extends Component
{
    use WithPagination, WithoutUrlPagination;

    public BarangForm $form;

    public function save() {
        $this->form->store();

        return $this->redirect('/barang/masuk');
    }

    public function render()
    {
        $barangs = Barang::latest()->paginate(5);

        return view('livewire.barang-masuk', [
            'barangs' => $barangs
        ]);
    }
}
