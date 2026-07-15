@extends('layouts.app')

@section('content')
<div style="max-width:500px; margin:30px auto; background:#fff8e7; padding:25px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; color:#BFA06E; margin-bottom:20px;">Ajouter une filière</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filieres.store') }}" method="POST" style="display:flex; flex-direction:column; gap:15px;">
        @csrf

        <label>Nom de la filière</label>
        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Informatique" required>

        <button type="submit" class="btn btn-success" style="margin-top:10px;">Ajouter la filière</button>
            <a href="{{ route('filieres.index') }}" class="btn-cancel" style="margin-top:10px;"> Annuler</a>
    </form>
</div>
@endsection
