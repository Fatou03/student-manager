<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    
    public function index()
    {
        $filieres = Filiere::withCount('etudiants')->paginate(5);
        return view('filieres.index', compact('filieres'));
    }

    
    public function create()
    {
        return view('filieres.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:filieres,nom',
        ]);

        Filiere::create($request->all());

        return redirect()->route('filieres.index')
                         ->with('success', 'Filière ajoutée avec succès !');
    }

   
    public function destroy($id)
    {
        $filiere = Filiere::findOrFail($id);

       
        if ($filiere->etudiants()->count() > 0) {
            return redirect()
                ->back()
                ->with('error', "Impossible de supprimer cette filière car elle contient encore des étudiants.");
        }

       
        $filiere->delete();

        return redirect()
            ->route('filieres.index')
            ->with('success', "Filière supprimée avec succès !");
    }

}
