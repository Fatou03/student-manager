<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;

class EtudiantController extends Controller
{
    public function index(Request $request)
    {
        $query = Etudiant::query();

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('filiere_id')) {
            $query->where('filiere_id', $request->filiere_id);
        }

                // Filtre par intervalle de date de naissance
        if ($request->filled('date_min')) {
            $query->where('date_naissance', '>=', $request->date_min);
        }

        if ($request->filled('date_max')) {
            $query->where('date_naissance', '<=', $request->date_max);
        }

        $query->orderBy('date_naissance', 'DESC');

        $query->orderBy('id', 'DESC');

        $etudiants = $query->with('filiere')->paginate(5);

        $filieres = Filiere::all();

        return view('etudiants.index', compact('etudiants', 'filieres'));
    }


    public function create()
    {
        $filieres = Filiere::all();
        return view('etudiants.create', compact('filieres'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email',
            'date_naissance' => 'required|date',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant ajouté avec succès !');
    }

  
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant supprimé avec succès !');
    }
}
