<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agent Habitat | Inspection</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




        <style>
            body {
                background-image: url('{{ asset("images/Arriere_plan.png") }}');
                background-size: cover;
                background-position: center;
                height: 100vh;
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
                            <a class="nav-link text-center text-decoration-none text-white" href="{{ url('/calender') }}">
                            <a class="nav-link text-center text-decoration-none text-white" href="{{--route('calendrier.index')--}}">
                                <img src="{{ asset('images/Icone_Calendrier.png') }}" alt="Calendrier" class="icone mb-2">
                                <span class="d-block">Calendrier des tournées</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-decoration-none text-white" href="{{route('inspections.index')}}">
                                <img src="{{ asset('images/Icone_Inspection.png') }}" alt="Inspections" class="icone mb-2">
                                <span class="d-block">Liste des Inspections</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-decoration-none text-white" href="{{--route('contact.index')--}}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/French.json"></script>
    
    <script>
        $(document).ready(function() {
            $('#inspectionTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/fr-FR.json'
                },
                ordering: true // Activer le tri ascendant/descendant
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inspectionTable').DataTable();
        });
    
        // Function to open delete confirmation modal
        function openDeleteConfirmationModal(inspectionId) {
            $('#overlay').show(); // Afficher le modal de confirmation
            // Vous pouvez effectuer d'autres actions ici si nécessaire
        }
    
        // Function to cancel deletion
        function cancelDelete() {
            $('#overlay').hide(); // Cacher le modal de confirmation
            // Vous pouvez effectuer d'autres actions ici si nécessaire
        }
    
        // Function to delete data (you can implement this as needed)
        function deleteData() {
            // Votre logique de suppression ici
            $('#overlay').hide(); // Cacher le modal de confirmation
            // Vous pouvez effectuer d'autres actions ici si nécessaire
        }
    </script>
    <!--script>
        
        // Function to open delete confirmation modal
        function openDeleteConfirmationModal(inspectionId) {
            $('#deleteConfirmationModal').modal('show');
    
            // Set the inspection ID to the delete button
            $('#confirmDelete').data('inspection-id', inspectionId);
        }
    
        // Function to handle inspection deletion
        $('#confirmDelete').click(function() {
            var inspectionId = $(this).data('inspection-id');
    
            // Here you can make an AJAX request to delete the inspection
            // Example:
            // $.ajax({
            //     url: '/inspections/' + inspectionId,
            //     type: 'DELETE',
            //     success: function(response) {
            //         // Handle success
            //     },
            //     error: function(xhr) {
            //         // Handle error
            //     }
            // });
    
            // For demonstration purpose, we'll simply log the inspection ID
            console.log('Deleting inspection with ID: ' + inspectionId);
    
            // Close the modal after deletion
            $('#deleteConfirmationModal').modal('hide');
        });
    
        // Initialize DataTable
        $(document).ready(function() {
            $('#inspectionTable').DataTable();
        });
    </script-->
    @stack('scripts')
    </body>
</html>