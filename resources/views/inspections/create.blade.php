@extends('layout.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3">Créer une Inspection</h2>
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('inspections.store') }}" method="POST" class="section text-black">
                @csrf

                <div class="form-group row">
                    <label for="libellé" class="col-md-2 col-form-label">Libellé :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('libellé') is-invalid @enderror" id="libellé" name="libellé" required>
                        @error('libellé')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_et_heure" class="col-md-2 col-form-label">Date et Heure :</label>
                    <div class="col-md-10">
                        <input type="datetime-local" class="form-control @error('date_et_heure') is-invalid @enderror" id="date_et_heure" name="date_et_heure" required>
                        @error('date_et_heure')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adresse" class="col-md-2 col-form-label">Adresse :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" required>
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nomLocataire" class="col-md-2 col-form-label">Nom du Locataire :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nomLocataire') is-invalid @enderror" id="nomLocataire" name="nomLocataire" required>
                        @error('nomLocataire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numeroLocataire" class="col-md-2 col-form-label">Numéro du Locataire :</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control @error('numeroLocataire') is-invalid @enderror" id="numeroLocataire" name="numeroLocataire" required>
                        @error('numeroLocataire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="conformité" class="col-md-2 col-form-label">Conformité RE 2020 :</label>
                    <div class="col-md-10">
                        <select class="form-control @error('conformité') is-invalid @enderror" id="conformité" name="conformité" required>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        @error('conformité')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="état" class="col-md-2 col-form-label">État :</label>
                    <div class="col-md-10">
                        <select class="form-control @error('état') is-invalid @enderror" id="état" name="état" required>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                        @error('état')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
