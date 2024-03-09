<?php

namespace App\Livewire\Forms;

use App\Livewire\BarangMasuk;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BarangForm extends Form
{
    #[Validate('required|string|max:125')]
    public string $name = "";

    #[Validate('required|integer')]
    public int $unit = 0;

    public function store() {
        DB::table('barang-masuk')->insert([
          "name" => $this->validate()['name'],
          "unit" => $this->validate()['unit'],
        ]);

        $this->reset();
    }
}
