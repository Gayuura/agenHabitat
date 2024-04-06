@extends('layout.app')

@section('content')
    <h2 class="my-3">Détails de la tournée : "{{ $tournee->title }}"</h2>
    <div class="container my-5">
        <div class="col-10">
            <form action="{{ route('tournee.update', $tournee->id) }}" method="post" class="section texte_noir">
                {{ csrf_field() }}
                @method('PUT')

                <div class="row form-group">
                    <div class="col-6">
                        <label for="tournee" class="champs_formulaire">Nom de la tournée :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="title" value="{{ $tournee->title }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="subject" class="champs_formulaire">Début de la tournée : </label>
                    </div>
                    <div class="col-6">
                        <input type="datetime-local" class="form-control" name="start" value="{{ $tournee->start }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="subject" class="champs_formulaire">Fin de la tournée : </label>
                    </div>
                    <div class="col-6">
                        <input type="datetime-local" class="form-control" name="end" value="{{ $tournee->end }}">
                    </div>
                </div>


                <input type="hidden" name="id" value="{{ $tournee->id }}">

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn_enregistrer">Enregistrer</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn_retour_js" onclick="history.back()">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection