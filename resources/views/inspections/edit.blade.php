@extends('layout.app')

@section('content')
    <h2 class="my-3">Détails de l'inspection : "{{ $inspection->title }}"</h2>
    <div class="container my-5">
        <div class="col-10">
            <form action="{{ route('inspection.update', $inspection->id) }}" method="post" class="section texte_noir">
                {{ csrf_field() }}
                @method('PUT')

                <div class="row form-group">
                    <div class="col-6">
                        <label for="inspection" class="champs_formulaire">Nom de l'inspection :</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="title" value="{{ $inspection->title }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="subject" class="champs_formulaire">Debut de l'inspection : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="start" value="{{ $inspection->start }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="message" class="champs_formulaire">Adresse du logement : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="adress" value="{{ $inspection->adress }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="name" class="champs_formulaire">Nom du locataire :   </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="nomLoca" value="{{ $inspection->nomLoca }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-6">
                        <label for="name" class="champs_formulaire">Numéro du locataire : </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="numLoca" value="{{ $inspection->numLoca }}">
                    </div>
                </div>


                <input type="hidden" name="id" value="{{ $inspection->id }}">

                <button type="submit" class="btn btn-success btn_enregistrer">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection