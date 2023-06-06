<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;

class Annee extends Model
{
    use HasFactory;
    protected $fillable = [
        'ida',
        'annee',

    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
