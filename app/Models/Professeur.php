<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Element;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'idp',
        'nom',
        'prenom',
        'photo',
        'CIN',
        'telephone',
        'adress',
        'email',
        'password',
        'role',
        'type',
        'genre',
        'datenaissance',
        'gmail',
        'prix_par_H'
    ];

    protected $hidden = [
        'password',
    ];
    
    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
