<?php

use App\Http\Controllers\ItemController;
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

    Route::prefix('item')->group(function() {
        Route::get('/list', [ItemController::class, 'list'])->name('items-list');
        Route::get('/incoming', [ItemController::class,'incoming'])->name('items-incoming');
        Route::get('/outcoming', [ItemController::class,'outcoming'])->name('items-outcoming');
    });
});
