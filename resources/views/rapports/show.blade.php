@extends('layout.app')

@section('content')
<h2 class="my-3">Rapport d'inspection</h2>
<div class="container my-5">
    <div class="col-lg-10">
        <div class="section texte_noir">
<h3 class="my-3 text-start">Le Locataire</h3>
            <!-- Locataire -->
            <div class="row rapport">
                <div class="col-md-6">
                    <label>Nom et prénom :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->nom_prenom }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Date d'entrée :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->date_entree }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Téléphone mobile :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->tel_mobile }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Adresse mail :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->email }}</div>
                </div>
            </div>

            <!-- Logement -->
        <div class="section texte_noir">
<h3 class="my-3 text-start">Le Logement</h3>
            <div class="row rapport">
                <div class="col-md-6">
                    <label>Date du rapport :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->date_rapport }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Adresse du logement :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->adresse_logement }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Type de logement :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->type_logement }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Nombre des pièces :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->nombre_pieces }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Superficie (m²) :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->superficie_m2 }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Étage :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->etage }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Type de toiture :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->toiture }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Date du rapport :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->date_rapport }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Type de chauffage :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->type_chauffage }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Année de construction :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->annee_construction }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Classe énergétique :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">{{ $rapport->classe_energetique }}</div>
                </div>
            </div>

            <div class="row rapport">
                <div class="col-md-6">
                    <label>Conformité RE 2020 :</label>
                </div>
                <div class="col-md-6">
                    <div class="font-italic fw-bold">
                        @if ($rapport->conformite_R2_2020)
                            <span class="text-success">Conforme</span>
                        @else
                            <span class="text-danger">Non Conforme</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="section texte_noir">
            <h3 class="my-3">Signatures</h3>
            <div class="row form-group">
                <div class="col-md-6">
                    <label class="signature">Signature de l'inspecteur :</label>
                    <img src="{{ $rapport->signature_inspecteur }}" alt="Signature de l'inspecteur">
                </div>
                <div class="col-md-6">
                    <label class="signature">Signature du locataire :</label>
                    <img src="{{ $rapport->signature_locataire }}" alt="Signature du locataire">
                </div>
            </div>
            <div class="row form-group justify-content-between">
                <div class="col-6 text-center d-flex">
                    <a href="{{ route('rapport.pdf', $rapport->id) }}" class="text-decoration-none btn_creer">Télécharger le rapport</a>
                </div>
                <div class="col-6 text-center d-flex">
                    <a href="{{ route('Retour.Inspection.show', $rapport->id) }}" class="text-dark text-decoration-none btn_retour">Retour à l'inspection</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection