@extends('layout.app')

@section('content')
<h2 class="my-3">Nouveau Rapport</h2>
<div class="container my-5">
    <form action="{{ route('report.step.one') }}" method="post" class="section texte_noir">
        {{ csrf_field() }}
        <h3 class="my-3">Le Locataire</h3>
        <div class="col-md-10">
            <div class="row form-group">
                <div class="col-5">
                    <label for="locataire">Nom et prénom :</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" id="name">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="subject">Date d'entrée :</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" id="time">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="message">Télephone mobile :</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Adresse mail :</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    

        <h3 class="my-3">Le Logement</h3>
        <div class="col-md-10">
            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Date du rapport : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Adresse du logement : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <span class="me-3">Type de logement :</span>
                </div>
                <div class="col-5">
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
                <div class="col-5">
                    <span class="me-3">Nombre de piéces :</span>
                </div>
                <div class="col-5">
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
                <div class="col-5">
                    <label for="name">Superficie : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>


            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Etage : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>


            <div class="row form-group">
                <div class="col-5">
                    <span class="me-3">Toiture :</span>
                </div>
                <div class="col-5">
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
                <div class="col-5">
                    <label for="name">Type de Chauffage : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Année de construction : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <label for="name">Classe Energetique : </label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-5">
                    <span class="me-3">Conformité RE 2020 :</span>
                </div>
                <div class="col-5">
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