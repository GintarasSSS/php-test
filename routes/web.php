<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;

Route::get('/', [PokedexController::class, 'index'])->name('pokedex.index');
Route::get('/pokemon/{name}', [PokedexController::class, 'show']);
