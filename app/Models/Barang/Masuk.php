<?php

namespace App\Models\Barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $tables = "barang-masuk";

    protected $fillable = [
        'name',
        'unit'
    ];
}
