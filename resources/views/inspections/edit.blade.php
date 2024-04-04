@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h2 class="my-3">Modifier l'Inspection</h2>
    </div>
    
    <div class="row">
        <div class="col-md-10">
            <form action="{{ route('inspections.update', $inspection->id) }}" method="POST" class="section text-black">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="libellé" class="col-md-2 col-form-label">Libellé :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="libellé" name="libellé" value="{{ $inspection->libellé }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_et_heure" class="col-md-2 col-form-label">Date et Heure :</label>
                    <div class="col-md-10">
                        <input type="datetime-local" class="form-control" id="date_et_heure" name="date_et_heure" value="{{ date('Y-m-d\TH:i', strtotime($inspection->date_et_heure)) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adresse" class="col-md-2 col-form-label">Adresse :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $inspection->adresse }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nomLocataire" class="col-md-2 col-form-label">Nom du Locataire :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nomLocataire" name="nomLocataire" value="{{ $inspection->nomLocataire }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numeroLocataire" class="col-md-2 col-form-label">Numéro du Locataire :</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="numeroLocataire" name="numeroLocataire" value="{{ $inspection->numeroLocataire }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="conformité" class="col-md-2 col-form-label">Conformité RE 2020 :</label>
                    <div class="col-md-10">
                        <select class="form-control @error('conformité') is-invalid @enderror" id="conformité" name="conformité" required>
                            <option value="1" {{ $inspection->conformité==1?'selected':'' }}>Oui</option>
                            <option value="0" {{ $inspection->conformité==0?'selected':'' }}>Non</option>
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
                            <option value="1"  {{ $inspection->état==1?'selected':'' }}>Actif</option>
                            <option value="0" {{ $inspection->état==0?'selected':'' }}>Inactif</option>
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
