<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use App\Models\Logement;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    function showReportForm($inspection = 0) {
        session(['inspection'=> $inspection]);
        return view('rapports.addRapport', compact('inspection'));
    }
    function showReportSigning(Request $request) {
    
        $inputs = $request->except('_token');
        //dd($request->inspection, session()->all());
        foreach ($inputs as $key => $value) {
            session([$key => $value]);
        }

        return view('rapports.addSignature');
    }
    function create(Request $request){
        dd( session('conformite_R2_2020'));
        //dd($request->all(), session()->all());
        // Récupérer les données de la signature du premier canvas
        $signatureData1 = $request->input('signatureData1');
        $signature1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData1));
        
        // Enregistrer les données de la signature dans un fichier sur le serveur
        $path1 = 'signatures/' . uniqid() . '.png';        
        Storage::put($path1, $signature1);

        // Récupérer les données de la signature du deuxième canvas
        $signatureData2 = $request->input('signatureData2');
        $signature2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData2));

        // Enregistrer les données de la signature dans un fichier sur le serveur
        $path2 = 'signatures/' . uniqid() . '.png';
        Storage::put($path2, $signature2);

        // Enregistrer les chemins d'accès des images des signatures dans la base de données
        // Supposons que vous ayez un modèle "Rapport" avec un champ "signature_path_1" et un champ "signature_path_2"
       
       $rapport = new Rapport();
       $rapport->signature_locataire = $path1;
       $rapport->signature_inspecteur = $path2;
       $rapport->inspection_id = session('inspection'); // Supposons que l'inspection a l'ID 1
       $rapport->save();

       $logement = new Logement();


       // Insérer les valeurs provenant de la session
       $logement->date_rapport = session('date_rapport');
       $logement->adresse_logement = session('adresse_logement');
       $logement->type_logement = session('type_logement');
       $logement->nombre_pieces = session('nombre_pieces');
       $logement->superficie_m2 = session('superficie_m2');
       $logement->etage = session('etage');
       $logement->toiture = session('toiture');
       $logement->type_chauffage = session('type_chauffage');
       $logement->annee_construction = session('annee_construction');
       $logement->classe_energetique = session('classe_energetique');
       $logement->conformite_R2_2020 = session('conformite_R2_2020');
       $logement->rapport_id = session('rapport_id');
       
       // Enregistrer le logement dans la base de données
       $logement->save();


       $locataire = new Locataire();

        // Insérer les valeurs provenant de la session
        $locataire->nom_prenom = session('nom_prenom');
        $locataire->date_entree = session('date_entree');
        $locataire->tel_mobile = session('tel_mobile');
        $locataire->email = session('email');
        $locataire->rapport_id = session('rapport_id');

        // Enregistrer le locataire dans la base de données
        $locataire->save();


        
        // Rediriger ou effectuer d'autres actions après l'enregistrement
    }
}