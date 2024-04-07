<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Tournee;
use App\Models\Rapport;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function allInspections()
    {
        $inspection = Inspection::all();
        return view('inspections.all', compact('inspection'));
    }

    public function index($tournee_id)
    {
        $tournee = Tournee::findOrFail($tournee_id);
        $inspection = $tournee->inspections;
    
        return view('inspections.index', compact('inspection', 'tournee'));
    }

    public function create($tournee_id)
    {
        return view('inspections.create', compact('tournee_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'adress' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'nomLoca' => 'required',
            'numLoca' => 'required|numeric',
        ]);
    
        $tournee_id = $request->tournee_id;
        $tournee = Tournee::findOrFail($tournee_id);
    
        $inspection = $tournee->inspections()->create([
            'title' => $validatedData['title'],
            'adress' => $validatedData['adress'],
            'start' => $validatedData['start'],
            'end' => $validatedData['end'],
            'nomLoca' => $validatedData['nomLoca'],
            'numLoca' => $validatedData['numLoca'],
            'conform' => $request->has('conform'),
            'etat' => $request->has('etat'),
        ]);
    
        return redirect()->route('inspection.show', $inspection->id)
            ->with('success', 'Inspection créée avec succès.');
    }

    public function show($id)
    {
        $inspection = Inspection::findOrFail($id);
        $tournee = $inspection->tournee;
    
        return view('inspections.show', compact('inspection', 'tournee'));
    }

    public function showFromRapport($rapportid)
    {
        // Récupérer le rapport
        $rapport = Rapport::findOrFail($rapportid);
    
        // Récupérer l'inspection associée au rapport
        $inspection = $rapport->inspection;
    
        // Récupérer la tournée associée à l'inspection
        $tournee = $inspection->tournee;
    
        return view('inspections.show', compact('inspection', 'tournee'));
    }
    

    public function edit(Inspection $inspection)
    {
        return view('inspections.edit', compact('inspection'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end'   => 'required|date',
            'adress' => 'required|string|max:255',
            'nomLoca' => 'required|string|max:255',
            'numLoca' => 'required|string|max:255',
        ]);
    
        $inspection = Inspection::findOrFail($id);
        $inspection->title = $validatedData['title'];
        $inspection->start = $validatedData['start'];
        $inspection->end = $validatedData['end'];
        $inspection->adress = $validatedData['adress'];
        $inspection->nomLoca = $validatedData['nomLoca'];
        $inspection->numLoca = $validatedData['numLoca'];
    
        $inspection->save();
    
        return redirect()->route('inspection.show', ['id' => $inspection->id])->with('success', 'Inspection mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $inspection = Inspection::findOrFail($id);
        $inspection->delete();
    }
}