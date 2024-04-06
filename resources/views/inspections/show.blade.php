@extends('layout.app')

@section('content')

    <h2 class="my-3">Détails de l'inspection : "{{ $inspection->title }}"</h2>
    <div class="container my-5">
        <div class="col-10">
            <div class="row form-group">
                <div class="col-6">
                    <label for="titre" class="details">Titre :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->title }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="adress" class="details">Adresse :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->adress }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="start" class="details">Debut de l'inspection :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->start }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="end" class="details">Fin de l'inspection :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->end }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="nomLoca" class="details">Nom du locataire :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->nomLoca }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="numLoca" class="details">Num du locataire :</label>
                </div>
                <div class="col-6">
                    <span class="details">{{ $inspection->numLoca }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="conform" class="details">Conformité RE 2020 :</label>
                </div>
                <div class="col-6">
                    <span class="details @if($inspection->conform) text-success @else text-danger @endif">
                        @if($inspection->conform)
                            Conforme
                        @else
                            Non Conforme
                        @endif
                    </span>

                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="etat" class="details">Etat :</label>
                </div>
                <div class="col-6">
                    <span class="details {{ $inspection->etat ? 'text-success' : '' }}">
                        {{ $inspection->etat ? 'Effectué' : 'Prévu' }}
                    </span>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="col-4 text-center d-flex">
                    <a href="{{ route('Insptournee.index', $tournee->id) }}" class="text-dark text-decoration-none btn_retour">Retour aux inspections</a>
                </div>
                @if (!$inspection->etat)
                    <div class="col-4 text-center d-flex">
                        <a href="{{ route('inspection.edit', $inspection->id) }}" class="text-dark text-decoration-none btn_modifier">Modifier l'inspection</a>
                    </div>

                    <div class="col-4 text-center d-flex">
                        <a href="{{ route('report.form', $inspection->id) }}" class="text-white text-decoration-none btn_New_rapport">Nouveau Rapport</a>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection