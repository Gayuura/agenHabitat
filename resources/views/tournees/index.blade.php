@extends('layout.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3">Liste des Tournées</h2>
    <div class="row">
        <div class="col-10">
            <div class="row mb-3">
                <div class="col-5 col-lg-3">
                    <input type="text" id="filterTitle" class="form-control" placeholder="Nom de la tournée">
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-lg-12 d-flex justify-content-end">
                    <a href="{{ url('/') }}" class="btn btn-success">Programmer une Tournée</a>
                </div>
            </div>
            @if ($tournee->isEmpty())
                <p>Aucune tournée trouvée.</p>
            @else
                <table class="table text-center" id="tourneeTable">
                    <thead>
                        <tr>
                            <th style="cursor: pointer;">Nom de la tournée</th>
                            <th style="cursor: pointer;">Début de la tournée</th>
                            <th style="cursor: pointer;">Fin de la tournée</th>
                            <th style="cursor: pointer;">Nombre d'inspections</th>
                            <th style="cursor: pointer;">État</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournee as $tournee)
                        <tr>
                            <td>
                                <a href="/tournee/{{ $tournee->id }}/inspection" class="text-dark text-decoration-none">{{ $tournee->title }}</a>
                            </td>
                            <td>{{ date('Y/m/d à H:i', strtotime($tournee->start)) }}</td>
                            <td>{{ date('Y/m/d à H:i', strtotime($tournee->end)) }}</td>
                            <td>{{ $tournee->inspections->count() }}</td>
                            <td>
                                @if ($tournee->etatGlobal === 'Terminé')
                                    <span class="text-success">{{ $tournee->etatGlobal }}</span>
                                @else
                                    <span class="fw-bold">{{ $tournee->etatGlobal }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($tournee->etatGlobal === 'Prévu')
                                    <a href="{{ route('inspection.create', $tournee->id) }}">
                                        <img src="{{ asset('images/Icone_Inspection.png') }}" class="img-icone img-fluid" alt="Créer une inspection">
                                    </a>
                                    <a href="{{ route('tournee.edit', $tournee->id) }}">
                                        <img src="{{ asset('images/Icone_Edition.png') }}" class="img-icone img-fluid" alt="Modifier la tournée">
                                    </a>

                                    <a href="#" onclick="openDeleteConfirmationModal({{ $tournee->id }})">
                                        <img src="{{ asset('images/Icone_Supprimer.png') }}" class="img-icone img-fluid" alt="Supprimer la tournée">
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
        $('#tourneeTable').DataTable({
            searching: false,
            paging: false,
            ordering: true,
            orderCellsTop: false,
            fixedHeader: false,
            columnDefs: [
                { targets: [5], orderable: false }
            ]
        });
        
        // filtrage
        function filterTable() {
            var filterTitle = $('#filterTitle').val().toLowerCase();
            
            $('#tourneeTable tbody tr').each(function() {
                var title = $(this).find('td:eq(0)').text().toLowerCase();

                
                if (filterTitle === '' || title.indexOf(filterTitle) !== -1){
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Lorsqu'un champ de filtrage est modifié, filtrer le tableau
        $('#filterTitle').on('input', function() {
            filterTable();
        });
    });

    // Pop up pour confirmation de suppression
    function openDeleteConfirmationModal(tourneeId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette tournée ?")) {
            $.ajax({
                url: '/tournee/' + tourneeId + '/delete',
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