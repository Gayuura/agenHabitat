@extends('layout.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3">Liste des Inspections</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="row ">
                <div class="col-md-10 col-lg-12 d-flex justify-content-end">
                    <a href="{{ route('inspections.create') }}" class="btn btn-success">Programmer une Inspection</a>
                </div>
            </div>
            @if ($inspections->isEmpty())
                <p>Aucune inspection trouvée.</p>
            @else
                <table class="table" id="inspectionTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libellé</th>
                            <th>Date et Heure</th>
                            <th>Adresse</th>
                            <th>Nom du Locataire</th>
                            <th>Numéro du Locataire</th>
                            <th>Conformité</th>
                            <th>État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inspections as $inspection)
                        <tr>
                            <td>{{ $inspection->id }}</td>
                            <td>{{ $inspection->libellé }}</td>
                            <td>{{ $inspection->date_et_heure }}</td>
                            <td>{{ $inspection->adresse }}</td>
                            <td>{{ $inspection->nomLocataire }}</td>
                            <td>{{ $inspection->numeroLocataire }}</td>
                            <td>{{ $inspection->conformité ? 'Oui' : 'Non' }}</td>
                            <td>{{ $inspection->état ? 'Actif' : 'Inactif' }}</td>
                            <td>
                                <a href="{{ route('inspections.edit', $inspection->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="openDeleteConfirmationModal({{ $inspection->id }})">Supprimer</button>
                                <a href="{{ route('inspections.show', $inspection->id) }}" class="btn btn-primary btn-sm">details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<!-- Modal for confirming inspection deletion -->
<div class="overlay" id="overlay">
    <div class="popup">
        <h4>Voulez-vous vraiment supprimer ces données ?</h4>
        <div class="btn-container d-flex justify-content-between p-4">
            <button class="btn btn-danger" onclick="deleteData()">Oui</button>
            <button class="btn btn-success" onclick="cancelDelete()">Non</button>
        </div>
    </div>
</div>


<style>
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #EBEBEB;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
    }

    .btn-container {
        text-align: center;
    }
</style>



@endsection
