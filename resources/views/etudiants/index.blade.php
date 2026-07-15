@extends('layouts.app')

@section('content')

<h2 class="page-title">Liste des étudiants</h2>

<div class="top-actions">
    <a href="{{ route('etudiants.create') }}" class="btn btn-success">+ Ajouter un étudiant</a>
</div>

<!--  FORMULAIRE DE RECHERCHE AVANCÉE SUR UNE LIGNE -->
<div class="search-container">
    <form action="{{ route('etudiants.index') }}" method="GET" class="search-line">

        <input type="text" name="nom" placeholder="Nom"
               value="{{ request('nom') }}">

        <input type="text" name="email" placeholder="Email"
               value="{{ request('email') }}">

        <select name="filiere_id">
            <option value="">-- Filière --</option>
            @foreach($filieres as $f)
                <option value="{{ $f->id }}"
                    {{ request('filiere_id') == $f->id ? 'selected' : '' }}>
                    {{ $f->nom }}
                </option>
            @endforeach
        </select>

        <input type="date" name="date_min" value="{{ request('date_min') }}">
        <input type="date" name="date_max" value="{{ request('date_max') }}">

        <button class="btn btn-primary">Rechercher</button>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">
            Réinitialiser
        </a>
    </form>
</div>

<!-- TABLEAU DES ÉTUDIANTS -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date naissance</th>
            <th>Filière</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($etudiants as $etudiant)
            <tr>
                <td>{{ $loop->iteration + ($etudiants->currentPage() - 1) * $etudiants->perPage() }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>{{ \Carbon\Carbon::parse($etudiant->date_naissance)->format('d/m/Y') }}</td>
                <td>{{ $etudiant->filiere->nom ?? '-' }}</td>

                <td class="text-center">
                   

                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}"
                          method="POST"
                          style="display:inline"
                          onsubmit="return confirm('Supprimer cet étudiant ?');">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center; padding: 20px;">
                    Aucun étudiant trouvé
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- PAGINATION QUI GARDE LES RECHERCHES -->
<div class="pagination-wrapper">
    {{ $etudiants->appends(request()->except('page'))->links() }}
</div>

@endsection
