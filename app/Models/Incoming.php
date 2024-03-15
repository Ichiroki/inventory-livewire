<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $table = 'incomings';

    protected $fillable = [
        'item_id',
        'quantity'
    ];

    public function item() {
        return $this->belongsTo(Barang::class, 'item_id');
    }
}
