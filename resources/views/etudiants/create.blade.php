@extends('layouts.app')

@section('content')

<div class="form-container">

    <h2>Ajouter un étudiant</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('etudiants.store') }}" method="POST" class="vertical-form">
        @csrf

        <div class="input-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="input-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="{{ old('prenom') }}" required>
        </div>

        <div class="input-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" value="{{ old('date_naissance') }}" required>
        </div>

        <div class="input-group">
            <label for="filiere_id">Filière</label>
            <select name="filiere_id" required>
                <option value="">-- Choisir une filière --</option>
                @foreach ($filieres as $f)
                    <option value="{{ $f->id }}">{{ $f->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="button-group">
            <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </div>

    </form>

</div>

@endsection
