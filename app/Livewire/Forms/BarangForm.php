<?php

namespace App\Livewire\Forms;

use App\Livewire\BarangMasuk;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BarangForm extends Form
{
    #[Validate('required', message: 'Name is required')]
    #[Validate('string', message: 'Name must use alphabetic / string characters')]
    #[Validate('max:125', message: 'Maximal character for name is 125 characters')]
    public string $name = "";

    #[Validate('required', message: 'Name is required')]
    #[Validate('integer', message: 'Name is must number')]
    public int $unit = 0;

    public function store() {
        $this->validate();

        Barang::create($this->all());

        $this->reset();
    }
}
