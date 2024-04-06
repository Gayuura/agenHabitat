<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournee;

class TourneeController extends Controller
{
    public function index()
    {
        $tournee = Tournee::all();
        return view('tournees.index', compact('tournee'));
    }

    public function show($id)
    {
        $tournee = Tournee::findOrFail($id);
        return view('tournees/show', compact('tournee'));
    }

    public function edit($id)
    {
        $tournee = Tournee::findOrFail($id);
        return view('tournees.edit', compact('tournee'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end'   => 'required|date',
        ]);
    
        $tournee = Tournee::findOrFail($id);
        $tournee->title = $validatedData['title'];
        $tournee->start = $validatedData['start'];
        $tournee->end = $validatedData['end'];
    
        $tournee->save();
    
        return redirect()->route('tournee.show', $tournee)->with('success', 'Inspection mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $tournee = Tournee::findOrFail($id);
    
        // Supprimer les inspections de la tournée
        foreach ($tournee->inspections as $inspection) {
            $inspection->delete();
        }
    
        // Supprimer la tournée
        $tournee->delete();
    }
}