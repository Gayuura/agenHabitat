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