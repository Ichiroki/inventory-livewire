<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'quantity'
    ];

    // public function incomings() {
    //     return $this->hasMany(Incoming::class);
    // }

    use HasFactory;
}
