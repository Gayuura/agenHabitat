
@extends('layout.app')

@section('content')
<!-- resources/views/inspections/show.blade.php -->

<h1>Inspection {{ $inspection->libellé }} :</h1>

<h2>Locataire: </h2>

@if($inspection->locataire)
    <p><strong>Nom:</strong> {{ $inspection->locataire->nom_prenom }}</p>
    <p><strong>Date d'entrée:</strong> {{ $inspection->locataire->date_entree }}</p>
    <p><strong>Téléphone mobile:</strong> {{ $inspection->locataire->tel_mobile ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $inspection->locataire->email ?? 'N/A' }}</p>
    
@else
    <p>Aucun locataire associé à cette inspection</p>
@endif

<h2>Détails du Logement</h2>

@if($inspection->logement)
    <p><strong>Adresse:</strong> {{ $inspection->logement->adresse }}</p>
    <p><strong>Description:</strong> {{ $inspection->logement->description }}</p>
    <p><strong>Type de logement:</strong> {{ $inspection->logement->type_logement }}</p>
    <p><strong>Nombre de pièces:</strong> {{ $inspection->logement->nombre_pieces }}</p>
    <p><strong>Superficie (m²):</strong> {{ $inspection->logement->superficie_m2 }}</p>
    <p><strong>Étage:</strong> {{ $inspection->logement->etage }}</p>
    <p><strong>Toiture:</strong> {{ $inspection->logement->toiture }}</p>
    <p><strong>Type de chauffage:</strong> {{ $inspection->logement->type_chauffage }}</p>
    <p><strong>Année de construction:</strong> {{ $inspection->logement->annee_construction }}</p>
    <p><strong>Classe énergétique:</strong> {{ $inspection->logement->classe_energetique }}</p>
    <p><strong>Conformité R2 2020:</strong> {{ $inspection->logement->conformite_R2_2020 ? 'Oui' : 'Non' }}</p>
    <!-- Ajoutez d'autres détails sur le logement si nécessaire -->
@else
    <p>Aucun logement associé à cette inspection</p>
@endif

<!-- Boutons -->
<div>
    <a href="{{-- route('retour') --}}" class="btn btn-primary">Retour</a>
    <a href="{{-- route('telecharger') --}}" class="btn btn-success">Télécharger</a>
</div>

@endsection