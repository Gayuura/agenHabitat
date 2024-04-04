@extends('layout.app')

{{-- show errors if any --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <h2 class="my-3">Contact Agen Habitat</h2>
    <div class="container my-5 d-flex align-items-center justify-content-center">
        <div class="col-6">
            <form action=" {{ route('contact.submit') }} " method="post" class="section texte_blanc">
                @csrf
                <div class="form-group">
                    <label for="email" class="champs_formulaire">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="name" class="champs_formulaire">Nom de l'inspecteur</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="subject" class="champs_formulaire">Objet</label>
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Entrez l'objet">
                </div>
                <div class="form-group">
                    <label for="message" class="champs_formulaire">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Entrez votre message"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn_envoyer">Envoyer</button>
            </form>
        </div>
    </div>
@endsection