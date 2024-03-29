<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomingItems extends Model
{
    use HasFactory;

    protected $table = "outcomings";

    protected $fillable = [
        'item_id',
        'quantity'
    ];

    public function item() {
        return $this->belongsTo(Barang::class);
    }
}
