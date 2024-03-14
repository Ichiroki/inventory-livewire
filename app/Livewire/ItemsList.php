<?php

namespace App\Livewire;

use App\Livewire\Forms\BarangForm;
use App\Models\Barang;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class ItemsList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public BarangForm $form;

    protected $updatedQueryString = [
        ['search' => ['except' => '']],
        ['page' => ['except' => 1]
    ]];

    public $search;

    protected $listeners = [
        'save'
    ];

    public function save() {
        $this->form->store();
    }

    public function render()
    {

        $barangs = Barang::latest()->paginate(5);

        if($this->search !== null) {
            $barangs = Barang::where('name', 'like', '%' . $this->search . '%')
                    ->latest()
                    ->paginate(5);
        }

        return view('livewire.items-list', [
            'barangs' => $barangs
        ]);
    }
}
