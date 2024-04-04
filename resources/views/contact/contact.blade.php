@extends('layout.app')

@section('content')
    <h2 class="my-3">Contact Agen Habitat</h2>
    <div class="container my-5 d-flex align-items-center justify-content-center">
        <div class="col-6">
            <form action="/contact" method="post" class="section texte_blanc">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="champs_formulaire">Nom de l'inspecteur</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="subject" class="champs_formulaire">Objet</label>
                    <input type="text" class="form-control" id="subject" placeholder="Entrez l'objet">
                </div>
                <div class="form-group">
                    <label for="message" class="champs_formulaire">Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Entrez votre message"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn_envoyer">Envoyer</button>
            </form>
        </div>
    </div>
@endsection