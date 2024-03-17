<?php

namespace App\Livewire\Forms;

use App\Models\Barang;
use Dotenv\Exception\ValidationException;
// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Form;

class IncomingForm extends Form
{
    public $item;
    public $item_id;
    public $quantity;

    public function rules() {
        return [
            'item_id' => [
                'required',
                ValidationRule::exists('items', 'id'),
            ],
            // 'oldQuantity' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
        ];
    }

    public function messages() {
        return [
            'quantity.required' => "Quantity is required",
            'quantity.integer' => "Quantity is must numeric character",
            'quantity.min' => "Quantity cannot be less than 1"
        ];
    }

    public function mount() {
        $this->item = Barang::all();
    }

    public function store() {
        try {
            $validated = $this->validate();

            $item = Barang::findOrFail($validated['item_id']);

            $newQuantity = $item->quantity + $validated['quantity'];

            // dd($newQuantity);

            DB::table('incomings')->insert([
                'item_id' => $validated['item_id'],
                'quantity' => $validated['quantity'],
            ]);

            $item->update(['quantity' => $newQuantity]);

            $this->reset();
        } catch (ValidationException $e) {
            echo $e;
        }
    }
}
