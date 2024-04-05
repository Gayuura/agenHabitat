<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InspectionController;

use App\Http\Controllers\RapportController;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

Route::get('/contact', function () {
    return view('contact/contact');
});

Route::post('/contact' , [ContactController::class, 'store'])->name('contact.submit');
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

Route::get('inspection',[InspectionController::class, 'index'])->name('inspection.index');
Route::get('/inspection/{id}', [InspectionController::class, 'show'])->name('inspection.show');
Route::delete('/inspection/{id}/delete', [InspectionController::class,'destroy'])->name('inspection.destroy');
Route::get('/inspection/{inspection}/edit', [InspectionController::class, 'edit'])->name('inspection.edit');
Route::put('/inspection/{inspection}', [InspectionController::class, 'update'])->name('inspection.update');


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