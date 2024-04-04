<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class InspectionController extends Controller
{
    /**
     * Afficher la liste des inspections.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspections = Inspection::all();
        return view('inspections.index', compact('inspections'));
    }

    /**
     * Afficher la liste des inspections.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspection = Inspection::with('locataire','logement')->find($id);
   

    // Vérifiez si l'inspection a des rapports associés
    if ($inspection) {
        
        return view('inspections.show', compact('inspection'));
    } else {
        // Gérer le cas où l'inspection avec l'ID donné n'existe pas
        // Par exemple, rediriger vers une autre page ou afficher un message d'erreur
    }
    }
    

    /**
     * Afficher le formulaire de création d'une nouvelle inspection.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inspections.create');
    }

    /**
     * Enregistrer une nouvelle inspection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libellé' => 'required|string',
            'adresse' => 'required|string',
            'date_et_heure' => 'required|date',
            'nomLocataire' => 'required|string',
            'numeroLocataire' => 'required|integer',
            'conformité' => 'required|boolean',
            'état' => 'required|boolean',
        ]);
        //dd($request);
        Inspection::create($request->except('_token'));

        return redirect()->route('inspections.index')->with('success', 'Inspection créée avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d'une inspection.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspection = Inspection::findOrFail($id);
        return view('inspections.edit', compact('inspection'));
    }

    /**
     * Mettre à jour une inspection existante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libellé' => 'required|string',
            'adresse' => 'required|string',
            'date_et_heure' => 'required|date',
            'nomLocataire' => 'required|string',
            'numeroLocataire' => 'required|integer',
            'conformité' => 'required|boolean',
            'état' => 'required|boolean',
        ]);

        $inspection = Inspection::findOrFail($id);
        $inspection->update($request->all());

        return redirect()->route('inspections.index')->with('success', 'Inspection mise à jour avec succès.');
    }

    /**
     * Supprimer une inspection existante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inspection = Inspection::findOrFail($id);
        $inspection->delete();

        return redirect()->route('inspections.index')->with('success', 'Inspection supprimée avec succès.');
    }
}
