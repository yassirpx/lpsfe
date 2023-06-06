<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Niveau;

class Etudiant extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'ide',
        'nom',
        'prenom',
        'photo',
        'CIN',
        'telephone',
        'adress',
        'email',
        'password',
        'role',
        'CNE',
        'genre',
        'datenaissance',
        'idn',
    ];

    protected $hidden = [
        'password',
    ];
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

}
