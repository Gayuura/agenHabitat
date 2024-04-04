@extends('layout.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3">Liste des Inspections</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="row mb-3">
                <div class="col-md-2">
                    <input type="text" id="filterTitle" class="form-control" placeholder="Nom de l'inspection">
                </div>
                <div class="col-md-2">
                    <input type="text" id="filterNomLocataire" class="form-control" placeholder="Nom du Locataire">
                </div>
                <div class="col-md-2">
                    <input type="number" id="filterNumLocataire" class="form-control" placeholder="Numéro du Locataire">
                </div>
            </div>

            <div class="row ">
                <div class="col-md-10 col-lg-12 d-flex justify-content-end">
                    <a href="{{ url('/calender') }}" class="btn btn-success">Programmer une Inspection</a>
                </div>
            </div>
            @if ($inspection->isEmpty())
                <p>Aucune inspection trouvée.</p>
            @else
                <table class="table" id="inspectionTable">
                    <thead>
                        <tr>
                            <th style="cursor: pointer;">Nom de l'inspection</th>
                            <th style="cursor: pointer;">Debut de l'inspection</th>
                            <th style="cursor: pointer;">Adresse</th>
                            <th style="cursor: pointer;">Nom du Locataire</th>
                            <th>Numéro du Locataire</th>
                            <th style="cursor: pointer;">Conformité</th>
                            <th style="cursor: pointer;">État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inspection as $inspection)
                        <tr>
                            <td>
                                <a href="/inspection/{{ $inspection->id }}" class="text-dark text-decoration-none">{{ $inspection->title }}</a>
                            </td>

                            <td>{{ $inspection->start }}</td>
                            <td>{{ $inspection->adress }}</td>
                            <td>{{ $inspection->nomLoca }}</td>
                            <td>{{ $inspection->numLoca }}</td>
                            <td>
                                @if ($inspection->conform)
                                    <span class="text-success">Conforme</span>
                                @else
                                    <span class="text-danger">Non Conforme</span>
                                @endif
                            </td>
                            <td>
                                @if ($inspection->etat)
                                    <span class="text-success">Terminé</span>
                                @else
                                    <span class="fw-bold">Prévu</span>
                                @endif
                            </td>
                            <td>
                                @if (!$inspection->etat)
                                    <a href="/inspection/{{ $inspection->id }}/create">
                                        <img src="{{ asset('images/Icone_Rapport.png') }}" class="img-icone img-fluid" alt="Créer un rapport">
                                    </a>
                                    <a href="/inspection/{{ $inspection->id }}/edit">
                                        <img src="{{ asset('images/Icone_Edition.png') }}" class="img-icone img-fluid" alt="Modifier l'inspection">
                                    </a>
                                    <a href="/inspection/{{ $inspection->id }}/delete" onclick="openDeleteConfirmationModal({{ $inspection->id }})">
                                        <img src="{{ asset('images/Icone_Supprimer.png') }}" class="img-icone img-fluid" alt="Supprimer l'inspection">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>


<!-- Inclure la bibliothèque DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialisation de la table avec DataTables
        $('#inspectionTable').DataTable({
            searching: false, // Activer la fonctionnalité de recherche
            paging: false, // Activer la pagination
            ordering: true, // Activer le tri
            orderCellsTop: false, // Placer les boutons de tri au-dessus de la table
            fixedHeader: false,
            columnDefs: [
                { targets: [4, 7], orderable: false }
            ]
        });
        
        // Fonction de filtrage
        function filterTable() {
            var filterTitle = $('#filterTitle').val().toLowerCase();
            var filterNomLocataire = $('#filterNomLocataire').val().toLowerCase();
            var filterNumLocataire = $('#filterNumLocataire').val().toLowerCase();
            
            $('#inspectionTable tbody tr').each(function() {
                var title = $(this).find('td:eq(0)').text().toLowerCase();
                var nomLocataire = $(this).find('td:eq(3)').text().toLowerCase();
                var numLocataire = $(this).find('td:eq(4)').text().toLowerCase();
                
                if ((filterTitle === '' || title.indexOf(filterTitle) !== -1) &&
                    (filterNomLocataire === '' || nomLocataire.indexOf(filterNomLocataire) !== -1) &&
                    (filterNumLocataire === '' || numLocataire.indexOf(filterNumLocataire) !== -1)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Lorsqu'un champ de filtrage est modifié, filtrer le tableau
        $('#filterTitle, #filterNomLocataire, #filterNumLocataire').on('input', function() {
            filterTable();
        });
    });
</script>

@endsection
