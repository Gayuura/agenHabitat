<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class RapportController extends Controller
{
    public function createReport($inspectionid)
    {
        $inspection = Inspection::findOrFail($inspectionid);
        return view('rapports.create', compact('inspection'));
    }
    
    public function storeReport(Request $request, $inspectionId)
    {
        $validatedData = $request->validate([
            'nom_prenom' => 'required',
            'date_entree' => 'required|date',
            'tel_mobile' => 'required|numeric',
            'email' => 'required|email',
            'date_rapport' => 'required|date',
            'adresse_logement' => 'required',
            'type_logement' => 'required',
            'nombre_pieces' => 'required|numeric',
            'superficie_m2' => 'required|numeric',
            'etage' => 'required|numeric',
            'toiture' => 'required',
            'type_chauffage' => 'required',
            'annee_construction' => 'required|numeric',
            'classe_energetique' => 'required',
            'conformite_R2_2020' => 'nullable',
            'signature_locataire' => 'nullable',
            'signature_inspecteur' => 'nullable',
        ]);

        $validatedData['inspection_id'] = $inspectionId;

        $conformiteR2020 = $request->has('conformite_R2_2020') ? true : false;
        $validatedData['conformite_R2_2020'] = $conformiteR2020;
    
        $request->session()->put('rapport_data', $validatedData);
    
        return view('rapports.signatures', ['inspectionId' => $inspectionId]);
    }
    
    
    public function storeSignatures(Request $request, $inspectionId)
    {
        $rapportData = $request->session()->get('rapport_data');
    
        $rapport = Rapport::create($rapportData);

        $rapport->update([
            'signature_inspecteur' => $request->input('signatureData1'),
            'signature_locataire' => $request->input('signatureData2'),
        ]);
    
        $inspection = Inspection::findOrFail($inspectionId);
        $inspection->update(['conform' => $rapport->conformite_R2_2020, 'etat' => 1]);

        $request->session()->forget('rapport_data');
    
        return redirect()->route('rapport.show', $rapport->id);
    }
    
    
    
    
    public function showReport($rapportId)
    {
        $rapport = Rapport::findOrFail($rapportId);
    
        return view('rapports.show', compact('rapport'));
    }

    public function showReportFromInspec($inspectionId)
    {
        $inspection = Inspection::findOrFail($inspectionId);
    
        $rapport = $inspection->rapport;

        return view('rapports.show', compact('rapport'));
    }
    
    

    public function generatePdf($rapportId)
    {
        $rapport = Rapport::findOrFail($rapportId);
        $signature = $rapport->signature;

        $pdf = PDF::loadView('rapports.pdf', compact('rapport', 'signature'));

        return $pdf->download('rapport.pdf');
    }
}