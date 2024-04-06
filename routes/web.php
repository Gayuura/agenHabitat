<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\TourneeController;


use App\Http\Controllers\RapportController;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

Route::middleware(['auth'])->group(function () {

    Route::get('/contact', function () {
        return view('contact/contact');
    });
    Route::post('/contact' , [ContactController::class, 'store'])->name('contact.submit');
    Route::get('/sended', function () {
        return view('contact/sended');
    });

    Route::get('/addRapport', function () {
        return view('rapports/addRapport');
    });
    
    Route::get('/',[CalenderController::class, 'index']);
    Route::post('/action', [CalenderController::class, 'action']);
    

    Route::get('/inspections', [InspectionController::class, 'allInspections'])->name('inspections.all');
    Route::get('/inspection/{id}',[InspectionController::class, 'show'])->name('inspection.show');
    Route::delete('/inspection/{id}/delete', [InspectionController::class,'destroy'])->name('inspection.destroy');
    Route::get('/inspection/{inspection}/edit', [InspectionController::class, 'edit'])->name('inspection.edit');
    Route::put('/inspection/{inspection}', [InspectionController::class, 'update'])->name('inspection.update');
    Route::post('/inspection/store', [InspectionController::class, 'store'])->name('inspection.store');


    Route::get('/tournee', [TourneeController::class, 'index'])->name('tournee.index');
    Route::get('/tournee/{id}', [InspectionController::class, 'index'])->name('inspection.index');
    Route::get('/tournee/{tournee}/edit', [TourneeController::class, 'edit'])->name('tournee.edit');
    Route::delete('/tournee/{id}/delete', [TourneeController::class,'destroy'])->name('tournee.destroy');
    Route::put('/tournee/{tournee}', [TourneeController::class, 'update'])->name('tournee.update');
    Route::get('/tournee/{id}', [TourneeController::class, 'show'])->name('tournee.show');
    Route::get('/tournee/{id}/inspection', [InspectionController::class, 'index'])->name('Insptournee.index');
    Route::get('/tournee/{tournee_id}/inspection/create', [InspectionController::class, 'create'])->name('inspection.create');


    Route::get('/ajout_de_rapport/{inspection}',  [RapportController::class,'showReportForm'] )->name('report.form');
    Route::post('/signature_rapport',  [RapportController::class,'showReportSigning'] )->name('report.step.one');
    Route::post('/insertion_rapport',  [RapportController::class,'create'] )->name('report.step.two');
});

// Routes de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->withoutMiddleware(['auth']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');