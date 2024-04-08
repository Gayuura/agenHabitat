<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'nom_prenom',
        'date_entree',
        'tel_mobile',
        'email',
        'date_rapport',
        'adresse_logement',
        'type_logement',
        'nombre_pieces',
        'superficie_m2',
        'etage',
        'toiture',
        'type_chauffage',
        'annee_construction',
        'classe_energetique',
        'conformite_R2_2020',
        'signature_inspecteur',
        'signature_locataire',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
