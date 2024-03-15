<?php

namespace App\Livewire\Forms;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class IncomingForm extends Form
{
    public $item;
    #[Validate('required', message: "Item is required")]
    #[Validate('exists:items,id', message: "This item was been listed")]
    public int $item_id = 1;

    #[Validate('required')]
    public $quantity;

    public function mount(int $quantity) {
        $this->item = Barang::all();
        $this->quantity = $quantity;
    }

    public function store() {
        $validated = $this->validate();

        $item = Barang::findOrFail($validated['item_id']);

        $newQuantity = $item->quantity + $validated['quantity'];

        if($newQuantity >= 1) {
            DB::table('incomings')->insert([
                'item_id' => $validated['item_id'],
                'quantity' => $newQuantity
            ]);

            $item->update(['quantity' => $newQuantity]);

            $this->reset();
        } else {
            $this->addError('quantity', 'The quantity cannot be less than the original quantity');
        }
    }
}
