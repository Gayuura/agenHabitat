<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function logement()
    {
        return $this->hasOne(Rapport::class);
    }

    public function locataire()
    {
        return $this->hasOne(Rapport::class);
    }
}
