<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('etudiants.index');
});

// Routes pour les filières
Route::resource('filieres', FiliereController::class)
    ->except(['show', 'edit', 'update']);

// Routes pour les étudiants 
Route::resource('etudiants', EtudiantController::class)
    ->except(['show', 'edit', 'update']);