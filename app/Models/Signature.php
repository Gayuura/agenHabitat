<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [
        'rapport_id',
        'signature_inspecteur',
        'signature_locataire',
    ];

    public function rapport()
    {
        return $this->belongsTo(Rapport::class);
    }
}