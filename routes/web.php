<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;

// Routes pour la gestion des inspections

Route::get('/inspections', [InspectionController::class,'index'])->name('inspections.index'); // Afficher la liste des inspections
Route::get('/inspections/create', [InspectionController::class,'create'])->name('inspections.create'); // Afficher le formulaire de création
Route::post('/inspections', [InspectionController::class,'store'])->name('inspections.store'); // Enregistrer une nouvelle inspection
Route::get('/inspection/{inspection}/edit', [InspectionController::class,'edit'])->name('inspections.edit'); // Afficher le formulaire d'édition
Route::put('/inspection/{inspection}', [InspectionController::class,'update'])->name('inspections.update'); // Mettre à jour une inspection existante
Route::delete('/inspection/{inspection}', [InspectionController::class,'destroy'])->name('inspections.destroy'); // Supprimer une inspection existante


Route::get('/inspection/{inspection}/details', [InspectionController::class,'show'])->name('inspections.show'); // Afficher la liste des inspections

Route::get('/ajout_de_rapport',  [RapportController::class,'showReportForm'] );
Route::post('/signature_rapport',  [RapportController::class,'showReportSigning'] )->name('report.step.one');
Route::post('/insertion_rapport',  [RapportController::class,'create'] )->name('report.step.two');

Route::get('/', [LoginController::class,'showLoginForm']);
Route::post('/login', [LoginController::class,'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/contact', function () {
    return view('contact');
});
Route::get('/sended', function () {
    return view('sended');
});

