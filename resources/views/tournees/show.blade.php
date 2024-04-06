@extends('layout.app')

@section('content')

    <h2 class="my-3">Détails de la tournée : "{{ $tournee->title }}"</h2>
    <div class="container my-5">
        <div class="col-10">
            <div class="row form-group">
                <div class="col-6">
                    <label for="titre" class="details">Titre :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $tournee->title }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="start" class="details">Debut de la tournée :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $tournee->start }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="end" class="details">Fin de la tournée :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $tournee->end }}</span>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="col-4">
                    <div class="text-center d-flex">
                        <a href="{{ route('tournee.index', $tournee->id) }}" class="text-dark text-decoration-none btn_retour">Retour aux tournées</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-center d-flex">
                        <a href="{{ route('tournee.edit', $tournee->id) }}" class="text-dark text-decoration-none btn_modifier">Modifier la tournée</a>
                    </div>
                </div>

                <div class="col-4 text-right">
                    <div class="text-center d-flex">
                        <a href="{{ route('inspection.create', 'tournee_id') }}" class="text-white text-decoration-none texte_blanc btn_New_rapport">Créer une Inspection</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection