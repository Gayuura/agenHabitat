@extends('layout.app')

@section('content')

    <h2 class="my-3">Détails de l'inspection : "{{ $inspection->title }}"</h2>
    <div class="container my-5">
        <div class="col-10">
            <div class="row form-group">
                <div class="col-6">
                    <label for="titre" class="detail_inspection">Titre :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ $inspection->title }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="adress" class="detail_inspection">Adresse :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ $inspection->adress }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="start" class="detail_inspection">Debut de l'inspection :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ \Carbon\Carbon::parse($inspection->start)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($inspection->datetime)->format('H:i') }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="end" class="detail_inspection">Fin de l'inspection :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ \Carbon\Carbon::parse($inspection->end)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($inspection->datetime)->format('H:i') }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="nomLoca" class="detail_inspection">Nom du locataire :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ $inspection->nomLoca }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="numLoca" class="detail_inspection">Num du locataire :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">{{ $inspection->numLoca }}</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="conform" class="detail_inspection">Conformité RE 2020 :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection @if($inspection->conform) text-success @else text-danger @endif">
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
                    <label for="etat" class="detail_inspection">Etat :</label>
                </div>
                <div class="col-6">
                    <span class="detail_inspection">
                        @if($inspection->etat)
                            Effectué
                        @else
                            Prévu
                        @endif
                    </span>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="col-6">
                    <button type="button" class="btn_modifier">Modifier l'inspection</button>
                </div>
                <div class="col-6 text-right">
                    <button type="submit" class="btn_New_rapport">Nouveau Rapport</button>
                </div>
            </div>

        </div>
    </div>
@endsection