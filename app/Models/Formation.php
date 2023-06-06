<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Annee;
use App\Models\Filiere;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'idfor',
        'nomfor',
         'ida'
    ];

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }


}
