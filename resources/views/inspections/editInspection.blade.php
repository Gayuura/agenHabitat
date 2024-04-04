@extends('layout.app')

@section('content')
    <h2 class="my-3">Inspection "    "</h2>
    <div class="container my-5">
        <div class="col-10">
            <form action="/editInspection" method="post" class="section texte_noir">
                {{ csrf_field() }}

                <div class="row form-group">
                    <div class="col-6">
                        <label for="inspection" class="champs_formulaire">Nom de l'inspection :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="subject" class="champs_formulaire">Heure de l'inspection : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="time">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="message" class="champs_formulaire">Adresse du logement : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="name" class="champs_formulaire">Nom du locataire :   </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="name" class="champs_formulaire">Numéro du locataire : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="name" class="champs_formulaire">Conformité RE 2020 : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn_enregistrer">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection