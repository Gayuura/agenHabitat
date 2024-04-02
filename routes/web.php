<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('connexion');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/sended', function () {
    return view('sended');
});
Route::get('/editInspection', function () {
    return view('editInspection');
});
Route::get('/addRapport', function () {
    return view('addRapport');
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', function () {
    return view('content.login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/