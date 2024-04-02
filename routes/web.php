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