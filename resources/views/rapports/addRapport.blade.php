@extends('layout.app')

@section('content')
<h2 class="my-3">Nouveau Rapport</h2>
<div class="container my-5">
    <div class="col-lg-10">
        <form action="{{ route('report.step.one') }}" method="post" class="section texte_noir">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" id="date_entree" name="inspection" value="{{$inspection}}">
            <h3 class="my-3">Le Locataire</h3>
            
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="nom_prenom" class="champs_formulaire">Nom et prénom :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nom_prenom" name="nom_prenom">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="date_entree" class="champs_formulaire">Date d'entrée :</label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" id="date_entree" name="date_entree">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="tel_mobile" class="champs_formulaire">Téléphone mobile :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="tel_mobile">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="email" class="champs_formulaire">Adresse mail :</label>
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
        

            <h3 class="my-3">Le Logement</h3>
                <div class="row form-group">
                    <div class="col-6">
                        <label for="date_rapport" class="champs_formulaire">Date du rapport : </label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" name="date_rapport">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="adresse_logement" class="champs_formulaire">Adresse du logement : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="adresse_logement">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="type_logement" class="champs_formulaire">Type de logement :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="type_logement">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="nombre_pieces" class="champs_formulaire">Nombre de pièces :</label>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" name="nombre_pieces">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="superficie_m2" class="champs_formulaire">Superficie (m²) :</label>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" name="superficie_m2">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="etage" class="champs_formulaire">Étage :</label>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" name="etage">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="toiture" class="champs_formulaire">Type de toiture :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="toiture">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="type_chauffage" class="champs_formulaire">Type de chauffage :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="type_chauffage">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="annee_construction" class="champs_formulaire">Année de construction :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="annee_construction">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="classe_energetique" class="champs_formulaire">Classe énergétique :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="classe_energetique">
                    </div>
                </div>

                <div class="row form-group justify-content-center">
                    <div class="col-1 d-flex justify-content-end align-items-center">
                        <input type="checkbox" class="form-check-input" id="conformite_R2_2020" name="conformite_R2_2020">
                    </div>
                    <div class="col-11 d-flex align-items-center">
                        <label for="conformite_R2_2020" class="champs_formulaire">Conformité R2 2020 :</label>
                    </div>
                </div>







                <button type="submit" class="btn btn-success btn_signer">Faire Signer</button>
        </form>
    </div>
</div>
@endsection
