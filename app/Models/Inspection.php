<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'adress',
        'start',
        'end',
        'nomLoca',
        'numLoca',
        'conform',
        'etat',
    ];

    public function tournee()
    {
        return $this->belongsTo(Tournee::class);
    }
}