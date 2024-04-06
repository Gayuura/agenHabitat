<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournee extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'end'];

    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

    public function getEtatGlobalAttribute()
    {
        if ($this->inspections->count() === 0) {
            return 'Prévu';
        }
    
        $toutesInspectionsTerminees = $this->inspections->every(function ($inspection) {
            return $inspection->etat;
        });
    
        return $toutesInspectionsTerminees ? 'Terminé' : 'Prévu';
    }
}