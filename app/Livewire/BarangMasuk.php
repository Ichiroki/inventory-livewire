<?php

namespace App\Livewire;

use App\Livewire\Forms\BarangForm;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BarangMasuk extends Component
{
    public BarangForm $form;

    public function save() {
        $this->form->store();

        return $this->redirect();
    }

    public function render()
    {
        $barangs = DB::table("barang-masuk")->get();

        return view('livewire.barang-masuk', [
            'barangs' => $barangs
        ]);
    }
}
