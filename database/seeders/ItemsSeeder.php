<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'name' => "gelas 220ml",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "botol mini 220ml",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "botol 330ml",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "botol 550ml",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "botol 1500ml",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "new galon 19L",
            'unit' => '100'
        ]);
        Barang::create([
            'name' => "refill galon 19L",
            'unit' => '100'
        ]);
    }
}
