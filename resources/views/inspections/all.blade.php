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
                    <input type="text" id="filterNomLoca" class="form-control" placeholder="Nom du Locataire">
                </div>
                <div class="col-md-2">
                    <input type="number" id="filterNumLoca" class="form-control" placeholder="Numéro du Locataire">
                </div>
            </div>

            <div class="row ">
                <div class="col-md-10 col-lg-12 d-flex justify-content-end">
                    <a href="{{ url('/') }}" class="btn btn-success">Programmer une Inspection</a>
                </div>
            </div>
            @if ($inspection->isEmpty())
                <p>Aucune inspection trouvée.</p>
            @else
                <table class="table" id="inspectionTable">
                    <thead>
                        <tr>
                            <th style="cursor: pointer;">Nom de l'inspection</th>
                            <th style="cursor: pointer;">Début de l'inspection</th>
                            <th style="cursor: pointer;">Fin de l'inspection</th>
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

                            <td>{{ date('Y/m/d à H:i', strtotime($inspection->start)) }}</td>
                            <td>{{ date('Y/m/d à H:i', strtotime($inspection->end)) }}</td>
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
                                    <a href="{{ route('report.form', $inspection->id) }}">
                                        <img src="{{ asset('images/Icone_Rapport.png') }}" class="img-icone img-fluid" alt="Créer un rapport">
                                    </a>
                                    <a href="{{ route('inspection.edit', $inspection->id) }}">
                                        <img src="{{ asset('images/Icone_Edition.png') }}" class="img-icone img-fluid" alt="Modifier l'inspection">
                                    </a>

                                    <a href="#" onclick="openDeleteConfirmationModal({{ $inspection->id }})">
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


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialisation de la table avec DataTables
        $('#inspectionTable').DataTable({
            searching: false,
            paging: false,
            ordering: true,
            orderCellsTop: false,
            fixedHeader: false,
            columnDefs: [
                { targets: [5, 8], orderable: false }
            ]
        });
        
        // filtrage
        function filterTable() {
            var filterTitle = $('#filterTitle').val().toLowerCase();
            var filterNomLoca = $('#filterNomLoca').val().toLowerCase();
            var filterNumLoca = $('#filterNumLoca').val().toLowerCase();
            
            $('#inspectionTable tbody tr').each(function() {
                var title = $(this).find('td:eq(0)').text().toLowerCase();
                var nomLoca = $(this).find('td:eq(4)').text().toLowerCase();
                var numLoca = $(this).find('td:eq(5)').text().toLowerCase();

                
                if ((filterTitle === '' || title.indexOf(filterTitle) !== -1) &&
                    (filterNomLoca === '' || nomLoca.indexOf(filterNomLoca) !== -1) &&
                    (filterNumLoca === '' || numLoca.indexOf(filterNumLoca) !== -1)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Lorsqu'un champ de filtrage est modifié, filtrer le tableau
        $('#filterTitle, #filterNomLoca, #filterNumLoca').on('input', function() {
            filterTable();
        });
    });

    // Pop up pour confirmation de suppression
    function openDeleteConfirmationModal(inspectionId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette inspection ?")) {
            $.ajax({
                url: '/inspection/' + inspectionId + '/delete',
                type: 'DELETE',
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            // L'utilisateur a cliqué sur "Annuler", ne rien faire
        }
    }

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

@endsection