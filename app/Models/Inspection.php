<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $fillable = [
        'libellé',
        'adresse',
        'date_et_heure',
        'nomLocataire',
        'numeroLocataire',
        'conformité',
        'état',
    ];

    public function rapport()
    {
        return $this->hasOne(Rapport::class);
    }

    public function locataire()
    {
        return $this->hasOneThrough(Locataire::class, Rapport::class);
    }

    public function logement()
    {
        return $this->hasOneThrough(Logement::class, Rapport::class);
    }
}
