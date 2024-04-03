<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalenderController;
use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('connexion');
});*/
Route::get('/contact', function () {
    return view('contact/contact');
});
Route::get('/sended', function () {
    return view('contact/sended');
});
Route::get('editInspection', function () {
    return view('/inspections/editInspection');
});
Route::get('/addRapport', function () {
    return view('rapports/addRapport');
});

Route::get('/', [LoginController::class,'showLoginForm']);
Route::post('/login', [LoginController::class,'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('calender',[CalenderController::class, 'index']);
Route::post('calender/action', [CalenderController::class, 'action']);

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