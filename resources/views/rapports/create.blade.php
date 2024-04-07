@extends('layout.app')

@section('content')
<h2 class="my-3">Nouveau Rapport</h2>
<div class="container my-5">
    <div class="col-lg-10">
        <form action="{{ route('rapport.store', $inspection) }}" method="post" class="section texte_noir">
            {{ csrf_field() }}

            <input type="hidden" name="inspection_id" value="{{ $inspection->id }}">

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
                    <input type="number" class="form-control" name="tel_mobile">
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="appartement" name="type_logement" value="Appartement">
                        <label class="champs_formulaire" for="appartement">Appartement</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="maison" name="type_logement" value="Maison">
                        <label class="champs_formulaire" for="maison">Maison</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="chambre" name="type_logement" value="Chambre">
                        <label class="champs_formulaire" for="chambre">Chambre</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="nombre_pieces" class="champs_formulaire">Nombre de pièces :</label>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="1piece" name="nombre_pieces" value="1">
                        <label class="champs_formulaire" for="1piece">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="2piece" name="nombre_pieces" value="2">
                        <label class="champs_formulaire" for="2piece">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="3piece" name="nombre_pieces" value="3">
                        <label class="champs_formulaire" for="3piece">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="4piece" name="nombre_pieces" value="4">
                        <label class="champs_formulaire" for="4piece">4+</label>
                    </div>                </div>
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
                    <label for="toiture" class="champs_formulaire">Type de toiture :</label>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="plate" name="toiture" value="Plate">
                        <label class="champs_formulaire" for="plate">Plate</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="pente" name="toiture" value="Pente">
                        <label class="champs_formulaire" for="pente">en Pente</label>
                    </div>                </div>
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
                    <label for="type_chauffage" class="champs_formulaire">Type de chauffage :</label>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Gaz Naturel" name="type_chauffage" value="Gaz Naturel">
                        <label class="champs_formulaire" for="Gaz Naturel">Gaz Naturel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Fioul" name="type_chauffage" value="Fioul">
                        <label class="champs_formulaire" for="Fioul">Fioul</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Electrique" name="type_chauffage" value="Electrique">
                        <label class="champs_formulaire" for="Electrique">Electrique</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Bois" name="type_chauffage" value="Bois">
                        <label class="champs_formulaire" for="Bois">Bois</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Charbon" name="type_chauffage" value="Charbon">
                        <label class="champs_formulaire" for="Charbon">Charbon</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Propane" name="type_chauffage" value="Propane">
                        <label class="champs_formulaire" for="Propane">Propane</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="Pompe à chaleur" name="type_chauffage" value="Pompe à chaleur">
                        <label class="champs_formulaire" for="Pompe à chaleur">Pompe à chaleur</label>
                    </div> 
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="A" name="classe_energetique" value="A">
                        <label class="champs_formulaire" for="A">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="B" name="classe_energetique" value="B">
                        <label class="champs_formulaire" for="B">B</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="C" name="classe_energetique" value="C">
                        <label class="champs_formulaire" for="C">C</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="D" name="classe_energetique" value="D">
                        <label class="champs_formulaire" for="D">D</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="E" name="classe_energetique" value="E">
                        <label class="champs_formulaire" for="E">E</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="F" name="classe_energetique" value="F">
                        <label class="champs_formulaire" for="F">F</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="G" name="classe_energetique" value="G">
                        <label class="champs_formulaire" for="G">G</label>
                    </div> 
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <input type="checkbox" class="form-check-input" id="conformite_R2_2020" name="conformite_R2_2020">
                </div>
                <div class="col-11 d-flex align-items-center">
                    <label for="conformite_R2_2020" class="champs_formulaire">Conformité RE 2020 :</label>
                </div>
            </div>

            <button type="submit" class="btn_signer">Passer à la signature</button>
        </form>
    </div>
</div>
@endsection