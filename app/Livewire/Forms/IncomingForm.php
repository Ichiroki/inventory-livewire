<?php

namespace App\Livewire\Forms;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class IncomingForm extends Form
{
    public $item;
    #[Validate('required')]
    public int $item_id = 1;

    #[Validate('required')]
    public int $unit;

    public function mount(int $unit) {
        $this->item = Barang::all();
        $this->unit = $unit;
    }

    public function store() {
        $validated = $this->validate();

        $item = Barang::findOrFail($validated['item_id']);

        $newQuantity = $item->unit + $validated['unit'];

        DB::table('incomings')->insert([
            'item_id' => $validated['item_id'],
            'quantity' => $newQuantity
        ]);

        $item->update(['unit' => $newQuantity]);

        $this->reset();
    }
}
