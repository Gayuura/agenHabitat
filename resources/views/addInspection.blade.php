@extends('layout.app')

@section('content')
    <h2 class="my-3">Inspection "    "</h2>
    <div class="container my-5">
        <div class="col-12 col-md-12 col-sm-6">
            <form action="/contact" method="post" class="section texte_noir">
                {{ csrf_field() }}
                <div class="form-group d-flex">
                    <label for="inspection">Nom de l'inspection :</label>
                    <input type="text" class="form-control" id="name">
                </div>

                <div class="form-group d-flex">
                    <label for="subject">Heure de l'inspection : </label>
                    <input type="text" class="form-control" id="time">
                </div>

                <div class="form-group d-flex">
                    <label for="message">Adresse du logement : </label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group d-flex">
                    <label for="name">Nom du locataire :   </label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group d-flex">
                    <label for="name">Numéro du locataire : </label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group d-flex">
                    <label for="name">Conformité RE 2020 : </label>
                    <input type="text" class="form-control">
                </div>

                <button type="submit" class="btn btn-success btn_enregistrer">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection