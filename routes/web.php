<?php

use App\Http\Controllers\ListController;

Route::get('/', [ListController::class, 'index'])->name('items.index');
Route::post('/items', [ListController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ListController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ListController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ListController::class, 'destroy'])->name('items.destroy');
