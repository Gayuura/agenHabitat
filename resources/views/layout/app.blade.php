<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agent Habitat | Inspection</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                background-image: url('{{ asset("images/Arriere_plan.png") }}');
                background-size: cover;
                background-position: center;
            }
        </style>
    </head>
    <body >
        <!-- Inclusion du header -->
        @include('include.header')
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <!-- Code pour le menu latéral gauche -->
                <div class="sidebar d-flex">
                    <ul class="nav flex-column justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link text-center text-decoration-none text-white" href="#">
                                <img src="{{ asset('images/Icone_Calendrier.png') }}" alt="Calendrier" class="icone mb-2">
                                <span class="d-block">Calendrier des tournées</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-decoration-none text-white" href="#">
                                <img src="{{ asset('images/Icone_Inspection.png') }}" alt="Inspections" class="icone mb-2">
                                <span class="d-block">Liste des Inspections</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-decoration-none text-white" href="#">
                                <img src="{{ asset('images/Icone_Contact.png') }}" alt="Contact" class="icone mb-2">
                                <span class="d-block">Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>


        <footer>
            
        </footer>
    </body>
</html>