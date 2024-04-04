<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    function showRapportForm() {
        return view('addRapport');
    }
    /*function showReportSigning() {
        return view('')
    }*/
}
