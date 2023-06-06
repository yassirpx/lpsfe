<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filiere;
use App\Models\Semestre;
class Niveau extends Model
{
    use HasFactory;
    protected $fillable = [
        'idn',
        'nomniveau',
         'idfil'
    ];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class);
    }
}
