<?php

use App\Http\Controllers\MasukController;
use App\Livewire\Barang\Masuk\Create;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('barang')->group(function() {
        Route::prefix('/masuk')->group(function() {
            Route::get('/', [MasukController::class, 'index'])->name('barang-masuk');

            Route::get('/create', Create::class)->name('barang-masuk-create');
        });
    });
});
