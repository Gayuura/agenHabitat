<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inspection = Inspection::all();
        return view('inspections/index', compact('inspection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inspection = Inspection::findOrFail($id);
        return view('inspections/show', compact('inspection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inspection = Inspection::findOrFail($id);
        return view('inspections.edit', compact('inspection'));
    }

    /**
     * Update the specified resource in storage.
     */    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'adress' => 'required|string|max:255',
            'nomLoca' => 'required|string|max:255',
            'numLoca' => 'required|string|max:255',
        ]);
    
        $inspection = Inspection::findOrFail($id);
        $inspection->title = $validatedData['title'];
        $inspection->start = $validatedData['start'];
        $inspection->adress = $validatedData['adress'];
        $inspection->nomLoca = $validatedData['nomLoca'];
        $inspection->numLoca = $validatedData['numLoca'];
    
        $inspection->save();
    
        return redirect()->route('inspection.index')->with('success', 'Inspection mise à jour avec succès.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inspection = Inspection::findOrFail($id);
        $inspection->delete();
    
        return redirect()->route('inspection.index')->with('success', 'Inspection supprimée avec succès.');
    }
    

}