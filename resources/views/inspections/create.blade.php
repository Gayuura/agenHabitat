@extends('layout.app')

@section('content')
    <h2>Ajouter une nouvelle inspection</h2>

    <div class="container">
            <div class="col-lg-10">
                <form action="{{ route('inspection.store', ['tournee_id' => $tournee_id]) }}" method="POST">
                    @csrf
                    <div class="titre text-center">Création d'une inspection</div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="title" class="champs_formulaire">Nom de l'inspection :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="adress" class="champs_formulaire">Adresse :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="adress" name="adress">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="start" class="champs_formulaire">Début de l'inspection :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" id="start" name="start">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="end" class="champs_formulaire">Fin de l'inspection :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="datetime-local" class="form-control" id="end" name="end">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="nomLoca" class="champs_formulaire">Nom du locataire :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nomLoca" name="nomLoca">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="numLoca" class="champs_formulaire">Numéro du locataire :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="numLoca" name="numLoca">
                        </div>
                    </div>

                    <div class="row form-group justify-content-between">
                        <div class="col-6">
                            <button type="submit" class="btn_creer">Créer l'inspection</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn_retour_js" onclick="history.back()">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection