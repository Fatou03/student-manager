<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager</title>
    
   
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- ================= Header ================= -->
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/logo-sm.png.png') }}" alt="Logo Student Manager" class="logo-sm">

            <span class="app-name">Student Manager</span>
        </div>

        <div class="navbar-right">
            <a href="{{ route('etudiants.index') }}" class="{{ request()->routeIs('etudiants.*') ? 'active' : '' }}">Étudiants</a>
            <a href="{{ route('filieres.index') }}" class="{{ request()->routeIs('filieres.*') ? 'active' : '' }}">Filières</a>
        </div>
    </nav>


    <!-- ================= Contenu ================= -->
    <div class="container">
        
        <!-- Messages flash -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

      <!-- Section de recherche -->
        @yield('search')

        <!-- Section principale -->
        @yield('content')
    </div>

    <!-- ================= Footer ================= -->
    <footer>
        Student Manager - Laravel TP
    </footer>

</body>
</html>
