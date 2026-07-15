@extends('layouts.app')

@section('content')

    

    <!-- Bouton Ajouter une filière -->
    <div style="text-align:right; margin-bottom:20px;">
        <a href="{{ route('filieres.create') }}" class="btn btn-success">Ajouter une filière</a>
    </div>

    <!-- Table des filières -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th class="text-center">Nombre d'étudiants</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($filieres as $filiere)
            <tr>
                <td>{{ $loop->iteration + ($filieres->currentPage() - 1) * $filieres->perPage() }}</td>
                <td>{{ $filiere->nom }}</td>
                <td class="text-center">{{ $filiere->etudiants_count ?? 0 }}</td>
                <td class="text-center">
                    <!-- Bouton Supprimer -->
                        <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cette filière ?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;">Aucune filière trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination numérotée -->
    @if ($filieres->hasPages())
    <ul class="pagination">
        
        @if ($filieres->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $filieres->previousPageUrl() }}">&laquo;</a></li>
        @endif

        {{-- Numéros de page --}}
        @foreach ($filieres->getUrlRange(1, $filieres->lastPage()) as $page => $url)
            @if ($page == $filieres->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        
        @if ($filieres->hasMorePages())
            <li><a href="{{ $filieres->nextPageUrl() }}">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
    @endif

@endsection
