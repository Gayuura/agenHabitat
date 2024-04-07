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
        // Valider les données du formulaire
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
            'conformite_R2_2020' => 'required',
        ]);
    
        // Indiquer la conformité R2 2020
        $validatedData['conformite_R2_2020'] = $request->has('conformite_R2_2020');
    
        // Ajouter l'ID de l'inspection au tableau des données validées
        $validatedData['inspection_id'] = $inspectionId;
    
        // Stocker les données du rapport en session pour les utiliser dans la page des signatures
        $request->session()->put('rapport_data', $validatedData);
    

        // Rediriger vers la page pour ajouter les signatures en utilisant l'ID du rapport
        return view('rapports.signatures');
    } 
    
    public function storeSignatures(Request $request)
    {
        // Récupérer les données du rapport de la session
        $rapportData = $request->session()->get('rapport_data');
    
        // Créer un nouveau rapport avec les données stockées
        $rapport = Rapport::create($rapportData);
    
        // Enregistrer les signatures dans le rapport nouvellement créé
        $rapport->update([
            'signature_inspecteur' => $request->input('signatureData1'),
            'signature_locataire' => $request->input('signatureData2'),
        ]);
    
        // Supprimer les données du rapport de la session après utilisation
        $request->session()->forget('rapport_data');
    
        // Rediriger vers la vue d'affichage du rapport
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