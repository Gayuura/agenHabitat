<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport PDF</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            font-size: 38px;
        }
        h2 {
            text-align: center;
            padding: 8px;
            color: white;
            background-color: #737bc0;
            border-radius: 50px;
        }
        .rapport {
            font-size: 13px;
            margin-top: 30px;
            margin-left: 20%;
        }
        .rapport label {
            margin-right: 30px;
            font-weight: bold;
        }
        .signature label{
            font-size: 13px;
            margin-top: 30px;
            font-weight: bold;
            margin-left: 15%;
        }
        .font-italic {
            font-style: italic;
        }
        .text-success{
            color: #126712;
            font-weight: bold;
        }
        .text-danger{
            color: #CE1C00;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Rapport d'inspection</h1>
    <h2>Le Locataire</h2>
    <div class="rapport">
        <div>
            <label>Nom et prénom :</label>
            <span class="font-italic">{{ $rapport->nom_prenom }}</span>
        </div><br>
        <div>
            <label>Date d'entrée :</label>
            <span class="font-italic">{{ $rapport->date_entree }}</span>
        </div><br>
        <div>
            <label>Téléphone mobile :</label>
            <span class="font-italic">{{ $rapport->tel_mobile }}</span>
        </div><br>
        <div>
            <label>Adresse mail :</label>
            <span class="font-italic">{{ $rapport->email }}</span>
        </div><br>
    </div>

    <h2>Le Logement</h2>
    <div class="rapport">
        <div>
            <label>Date du rapport :</label>
            <span class="font-italic">{{ $rapport->date_rapport }}</span>
        </div><br>
        <div>
            <label>Adresse du logement :</label>
            <span class="font-italic">{{ $rapport->adresse_logement }}</span>
        </div><br>
        <div>
            <label>Type de logement :</label>
            <span class="font-italic">{{ $rapport->type_logement }}</span>
        </div><br>
        <div>
            <label>Nombre des pièces :</label>
            <span class="font-italic">{{ $rapport->nombre_pieces }}</span>
        </div><br>
        <div>
            <label>Superficie (m²) :</label>
            <span class="font-italic">{{ $rapport->superficie_m2 }}</span>
        </div><br>
        <div>
            <label>Étage :</label>
            <span class="font-italic">{{ $rapport->etage }}</span>
        </div><br>
        <div>
            <label>Type de toiture :</label>
            <span class="font-italic">{{ $rapport->toiture }}</span>
        </div><br>
        <div>
            <label>Date du rapport :</label>
            <span class="font-italic">{{ $rapport->date_rapport }}</span>
        </div><br>
        <div>
            <label>Type de chauffage :</label>
            <span class="font-italic">{{ $rapport->type_chauffage }}</span>
        </div><br>
        <div>
            <label>Année de construction :</label>
            <span class="font-italic">{{ $rapport->annee_construction }}</span>
        </div><br>
        <div>
            <label>Classe énergétique :</label>
            <span class="font-italic">{{ $rapport->classe_energetique }}</span>
        </div><br>
        <div>
            <label>Conformité RE 2020 :</label>
            <div class="font-italic">
                @if ($rapport->conformite_R2_2020)
                    <span class="text-success" style="margin-left: 40%;">Conforme</span>
                @else
                    <span class="text-danger">Non Conforme</span>
                @endif
            </div>
        </div><br>
    </div>

        <div class="signature">
            <div style="display: flex;">
                <label>Signature de l'inspecteur</label>
                <label>Signature du locataire</label>
            </div><br>
            <div>
                <span><img src="{{ $rapport->signature_inspecteur }}" alt="Signature de l'inspecteur"></span>
                <span><img src="{{ $rapport->signature_locataire }}" alt="Signature du locataire"></span>
            </div>
        </div>

</body>
</html>