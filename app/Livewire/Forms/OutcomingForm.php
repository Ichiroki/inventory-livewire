<?php

namespace App\Livewire\Forms;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OutcomingForm extends Form
{
    public $item;

    #[Validate('required')]
    public int $item_id;

    #[Validate('required')]
    public int $qty;

    public function mount(int $qty) {
        $this->item = Barang::all();
        $this->qty = $qty;
    }

    public function store() {
        $validated = $this->validate();

        $item = Barang::findOrFail($validated['item_id']);

        $newQuantity = $item->quantity - $validated['quantity'];

        DB::table('incomings')->insert([
            'item_id' => $validated['item_id'],
            'quantity' => $newQuantity
        ]);

        $item->update(['quantity' => $newQuantity]);

        $this->reset();
    }
}
