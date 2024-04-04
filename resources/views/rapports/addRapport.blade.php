@extends('layout.app')

@section('content')
<h2 class="my-3">Nouveau Rapport</h2>
<div class="container my-5">
    <form action="/addRapportLoc" method="post" class="section texte_noir">
        {{ csrf_field() }}
        <h3 class="my-3">Le Locataire</h3>
        <div class="col-md-12">
            <div class="row form-group">
                <div class="col-6">
                    <label for="locataire" class="champs_formulaire">Nom et prénom :</label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="name">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="subject" class="champs_formulaire">Date d'entrée :</label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="time">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="message" class="champs_formulaire">Télephone mobile :</label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Adresse mail :</label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    

        <h3 class="my-3">Le Logement</h3>
        <div class="col-md-12">
            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Date du rapport : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Adresse du logement : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <span class="me-3 champs_formulaire">Type de logement :</span>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typedelogement">
                        <label class="form-check-label" for="appartement">Appartement</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typedelogement">
                        <label class="form-check-label" for="maison">Maison</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typedelogement">
                        <label class="form-check-label" for="chambre">Chambre</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <span class="me-3 champs_formulaire">Nombre de piéces :</span>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nbrdepieces">
                        <label class="form-check-label" for="1piece">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nbrdepieces">
                        <label class="form-check-label" for="2piece">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nbrdepieces">
                        <label class="form-check-label" for="3piece">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nbrdepieces">
                        <label class="form-check-label" for="4+piece">4+</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Superficie : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>


            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Etage : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>


            <div class="row form-group">
                <div class="col-6">
                    <span class="me-3 champs_formulaire">Toiture :</span>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typedetoiture">
                        <label class="form-check-label" for="Plate">Plate</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typedetoiture">
                        <label class="form-check-label" for="Pente">en Pente</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Type de Chauffage : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Année de construction : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <label for="name" class="champs_formulaire">Classe Energetique : </label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-6">
                    <span class="me-3 champs_formulaire">Conformité RE 2020 :</span>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="conformité">
                        <label class="form-check-label" for="Conforme">Conforme</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="conformité">
                        <label class="form-check-label" for="Non Conforme">Non Conforme</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn_signer">Faire Signer</button>
            
        </div>
    </form>
</div>
@endsection